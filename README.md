# Hospital São Lucas e Mendel - Sistema de Gestão

Sistema de gestão para clínicas médicas, desenvolvido para o Hospital São Lucas e Mendel. O sistema permite o gerenciamento completo de médicos, pacientes, consultas, especialidades e convênios.

## 🚀 Funcionalidades

### Gestão de Médicos

-   Cadastro completo de médicos
-   Gerenciamento de especialidades
-   Controle de horários de atendimento
-   Status de atividade
-   Histórico de admissão/demissão

### Gestão de Pacientes

-   Cadastro de pacientes
-   Histórico de consultas
-   Status do cadastro
-   Informações de contato

### Agendamento de Consultas

-   Marcação de consultas
-   Verificação de disponibilidade
-   Controle de status (agendada, realizada, cancelada)
-   Validação de horários e especialidades

### Gestão de Especialidades

-   Cadastro de especialidades médicas
-   Descrição detalhada
-   Vinculação com médicos

### Gestão de Convênios

-   Cadastro de convênios
-   Autorizações
-   Controle de pagamentos

## 🛠️ Tecnologias Utilizadas

-   PHP 8.2
-   Laravel 10.x
-   MySQL
-   Bootstrap 5
-   jQuery
-   jQuery Mask Plugin

## 📋 Pré-requisitos

-   PHP >= 8.2
-   Composer
-   MySQL >= 5.7
-   Node.js e NPM (para assets)

## 🔧 Instalação

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/hospital-sao-lucas-mendel.git
cd hospital-sao-lucas-mendel
```

2. Instale as dependências do PHP:

```bash
composer install
```

3. Configure o arquivo .env:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo .env:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospital_sao_lucas_mendel
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

5. Execute as migrações:

```bash
php artisan migrate
```

6. (Opcional) Execute os seeders:

```bash
php artisan db:seed
```

7. Inicie o servidor:

```bash
php artisan serve
```

## 📦 Estrutura do Banco de Dados

### Tabelas Principais

#### Médicos

-   ID
-   Nome
-   CPF (único)
-   Gênero
-   Idade
-   Data de Nascimento
-   Endereço
-   Telefone
-   Matrícula (única)
-   Data de Admissão
-   Data de Demissão
-   Necessidades Especiais
-   Status

#### Pacientes

-   ID
-   Nome
-   CPF (único)
-   Telefone
-   Endereço
-   Data de Nascimento
-   Status do Cadastro

#### Consultas

-   ID
-   Paciente (FK)
-   Médico (FK)
-   Especialidade (FK)
-   Data
-   Hora
-   Status

#### Especialidades

-   ID
-   Nome
-   Descrição

#### Horários Médicos

-   ID
-   Médico (FK)
-   Especialidade (FK)
-   Dia da Semana
-   Hora Início
-   Hora Fim
-   Status

## 🔐 Segurança

-   Validação de dados em todos os formulários
-   Proteção contra SQL Injection
-   Máscaras para campos formatados
-   Validação de horários e disponibilidade
-   Soft deletes para exclusão segura

## 🎨 Interface

-   Design responsivo
-   Bootstrap 5
-   Formulários com validação visual
-   Feedback de erros
-   Máscaras para campos formatados

## 📝 Validações Implementadas

### Médicos

-   CPF único
-   Matrícula única
-   Data de nascimento válida
-   Telefone formatado
-   Campos obrigatórios

### Pacientes

-   CPF único
-   Telefone formatado
-   Data de nascimento válida
-   Campos obrigatórios

### Consultas

-   Verificação de disponibilidade
-   Validação de horário
-   Verificação de especialidade
-   Status válido

## 🔄 Fluxo de Trabalho

1. Cadastro de Médicos e Especialidades
2. Definição de Horários de Atendimento
3. Cadastro de Pacientes
4. Agendamento de Consultas
5. Gestão de Convênios e Pagamentos

## 🤝 Contribuição

1. Faça o fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## ✨ Próximas Implementações

-   [ ] Sistema de notificações
-   [ ] Prontuário eletrônico
-   [ ] Área do paciente
-   [ ] Área do médico
-   [ ] Relatórios e estatísticas
-   [ ] Integração com WhatsApp
-   [ ] Sistema de avaliação
-   [ ] Backup automático

## 📞 Suporte

Para suporte, envie um email para seu-email@dominio.com ou abra uma issue no GitHub.
