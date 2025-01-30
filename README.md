# BackEnd-FacilConsulta

**Descrição:**  
Este é o teste técnico para desenvolvedor backend na **FácilConsulta**. A API foi desenvolvida em **Laravel 11** e utiliza uma arquitetura de camadas para organizar o código. A aplicação foi estruturada para facilitar a interação e troca de estrutura (driver) do banco de dados e garantir uma boa experiência de desenvolvimento e manutenção.

---

## Estrutura da Aplicação

A aplicação segue a arquitetura de camadas, organizada da seguinte forma:

- **Controller:** Responsável pelas rotas da API, que recebem e enviam as requisições HTTP.
- **Service:** Contém a lógica de negócios da aplicação.
- **Repository:** Faz a interação com o banco de dados.
- **FormRequest:** Utilizado para validação dos campos dos formulários.
- **Providers (Binding de Dependências):** A injeção de dependência é aplicada utilizando o binding de providers, o que facilita o gerenciamento das dependências de forma mais flexível para os services e repositories.

---

## Tecnologias Utilizadas

- **Laravel 11:** Framework PHP utilizado para desenvolver a API.
- **JWT (JSON Web Token):** Utilizado para autenticação e segurança da aplicação.
- **Laravel Sail:** Usado para configurar os containers Docker para a aplicação e banco de dados.
- **MySQL:** Banco de dados utilizado com Laravel Sail.

## Projects

- O projeto contém um Project que foi utilizado para definir e gerênciar os passos necessários para alcançar o resultado final no desenvolvimento. https://github.com/users/Edgarvital/projects/4/views/1
