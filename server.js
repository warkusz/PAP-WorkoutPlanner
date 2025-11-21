const express = require("express");
const sqlite3 = require("sqlite3").verbose();
const bcrypt = require("bcrypt");
const bodyParser = require("body-parser");
const cors = require("cors");

const app = express();
app.use(bodyParser.json());
app.use(cors());

// Conectar/Criar o Banco de Dados (users.db)
const db = new sqlite3.Database("./users.db");

// Criar a Tabela 'users' (usa EMAIL como campo único)
db.run(`CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT UNIQUE,
    password TEXT
)`);

// 🛑 ROTA DE REGISTO (/register)
app.post("/register", (req, res) => {
  const { email, password } = req.body;

  // 1. Hashing da password (CRÍTICO para segurança)
  const saltRounds = 10;
  bcrypt.hash(password, saltRounds, (err, hash) => {
    if (err) return res.status(500).json({ error: err.message });

    // 2. Armazenar o email e o hash no DB
    const sql = `INSERT INTO users (email, password) VALUES (?, ?)`;
    db.run(sql, [email, hash], function (err) {
      if (err) {
        // Erro 400: geralmente e-mail já existe (UNIQUE constraint)
        return res.status(400).json({ error: "O email já está registado." });
      }
      res.json({
        message: "Utilizador criado com sucesso",
        userId: this.lastID,
      });
    });
  });
});

// ✅ ROTA DE LOGIN (/login) - Já corrigida para usar email
app.post("/login", (req, res) => {
  const { email, password } = req.body;

  const sql = `SELECT * FROM users WHERE email = ?`;
  db.get(sql, [email], (err, user) => {
    if (err) return res.status(500).json({ error: err.message });
    if (!user) return res.status(400).json({ error: "Email não encontrado." });

    // Comparar a password fornecida com o hash guardado
    bcrypt.compare(password, user.password, (err, result) => {
      if (result) {
        // Aqui você deve iniciar a sessão (ex: criar um token JWT)
        res.json({ message: "Login realizado com sucesso!" });
      } else {
        res.status(401).json({ error: "Palavra-passe incorreta." });
      }
    });
  });
});

// Iniciar o Servidor
app.listen(3000, () => {
  console.log("Servidor a correr na porta 3000");
});
