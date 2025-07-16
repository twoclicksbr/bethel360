# Bethel360

**Bethel360** é uma plataforma completa de gestão para igrejas de médio e grande porte (500+ membros), focada em estruturação por credenciais (igrejas), campus (unidades), ministérios, celebrações, eventos e cursos.

---

## 🎯 Objetivo

Centralizar toda a gestão e operação das atividades da igreja em um só sistema, com controle total sobre:

- Pessoas e perfis
- Campus e unidades
- Ministérios e lideranças
- Celebrações recorrentes (ex: cultos)
- Escalas e participações
- Eventos pontuais
- Cursos e inscrições
- Permissões por módulo e ação
- Arquivos, contatos, documentos, observações e muito mais

---

## ⚙️ Estrutura técnica

- **Framework**: Laravel 11
- **PHP**: 8.3+
- **Banco**: MySQL 8+
- **Frontend**: Blade (Metronic)
- **Autenticação**: API Token (24h)
- **Padrão RESTful** para todos os endpoints

---

## 📁 Organização por fases

1. **Identidade e Acesso** ✅
2. **Tabelas auxiliares reutilizáveis** ✅
3. **Ministérios e Lideranças** ✅
4. **Celebrações e Escalas** ✅
5. Eventos e Cursos (em andamento)

---

## 🧱 Estrutura de módulos

- `credential/` – credenciais (igrejas)
- `campus/` – unidades físicas
- `person/` – cadastro de pessoas
- `person_user/` – usuário e login
- `token/` – controle de sessão
- `ministry/` – ministérios
- `theme_ministry/` – templates como celebration, kids etc.
- `theme_celebration/` – cultos fixos
- `theme_celebration_occurrence/` – ocorrências semanais
- `theme_celebration_ministry/` – ministérios escalados
- `theme_celebration_participation/` – escala de voluntários

---

## 🧪 Como rodar localmente

```bash
git clone https://github.com/twoclicksbr/bethel360.git
cd bethel360
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
