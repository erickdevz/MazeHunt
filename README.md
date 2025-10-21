<div align="center">

# 🌀 Maze Hunt — Plataforma de E-Commerce Acessível

[![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-EE4623?style=for-the-badge&logo=codeigniter&logoColor=white)](https://codeigniter.com/)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-Database-336791?style=for-the-badge&logo=postgresql&logoColor=white)](https://www.postgresql.org/)
[![Supabase](https://img.shields.io/badge/Supabase-DB%20Hosting-3ECF8E?style=for-the-badge&logo=supabase&logoColor=white)](https://supabase.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](LICENSE)

</div>

Maze Hunt é um projeto em desenvolvimento voltado para criar uma plataforma de **e-commerce inclusiva e acessível**, com foco em usabilidade, integração com APIs externas e arquitetura escalável.

---

## 🧩 Tecnologias Utilizadas

**Back-end**
- PHP 8+
- CodeIgniter 4
- PostgreSQL
- Supabase (banco de dados hospedado)
- Composer (gerenciador de dependências)

**Ambiente de Desenvolvimento**
- Linux Mint / WSL2
- Git + GitHub
- VS Code

---

## ⚙️ Configuração do Projeto

### 1. Clonar o repositório
```bash
git clone https://github.com/seu-usuario/maze-hunt.git
cd maze-hunt
````
2. Instalar dependências
```bash
composer install
````
3. Configurar o ambiente

Crie o arquivo .env na raiz do projeto:
```bash
cp env .env
````

Edite o .env conforme sua configuração local:
```bash
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'
app.timezone = America/Sao_Paulo

# PostgreSQL (Supabase)
database.default.DSN = "pgsql:host=db.uprtrilidttpmlmmtche.supabase.co;port=5432;dbname=postgres;user=postgres;password=SENHA_AQUI;sslmode=require"
database.default.DBDriver = Postgre
database.default.charset = UTF8
````
▶️ Executar o Servidor Local:
```bash
php spark serve
````

O projeto estará acessível em:
👉 http://localhost:8080/
```
🗂 Estrutura de Pastas
📦 app/
 ┣ 📂 Controllers/
 ┣ 📂 Models/
 ┣ 📂 Views/
 ┣ 📂 Config/
 ┗ 📂 Services/
📦 public/
📦 writable/
📦 vendor/
.env
composer.json
````

##  Banco de Dados
O projeto utiliza PostgreSQL hospedado no Supabase, podendo ser migrado futuramente para outro servidor PostgreSQL.

| Tabela            | Descrição                                                      |
| -------------------- | -------------------------------------------------------------- |
| **promotions**         | Armazena promoções e ofertas integradas de lojas parceiras.   |
| **users**         |Cadastro básico de usuários (em planejamento). |
| **orders** |  Registros de pedidos (em fase de análise).    |

---

## 🌍 Deploy

- Atualmente o deploy ainda está em fase de estudo. A aplicação foi desenvolvida para rodar facilmente em qualquer servidor compatível com PHP 8+ e PostgreSQL (Render, Railway, Supabase Functions, VPS, etc.). 
> 🔄 Este README foi estruturado para permitir atualização rápida assim que o ambiente de produção for definido.

---

## 🧠 Futuro do Projeto
- Integração com APIs de marketplaces (Amazon, Shopee, AliExpress, etc.) 
- Sistema de autenticação com OAuth2 / JWT
- Dashboard administrativo acessível
- Implementação de padrões WCAG 2.1 (acessibilidade digital)


## 🧾 Licença

Este projeto está licenciado sob os termos da **MIT License**.
Consulte o arquivo [LICENSE](./LICENSE) para mais informações.

---

## 👨‍💻 Autor

**Erick Xavier**
Desenvolvedor Back-End Java • Fullstack em formação
📍 Viçosa – MG
🔗 [LinkedIn](https://linkedin.com/in/erickxavierdev)
💻 [GitHub](https://github.com/erickdevz)
📫 [erickxavier.dev@gmail.com](mailto:erickxavier.dev@gmail.com)

---
