# База данных

## Структура 

```mermaid

erDiagram
    Users {
        int id
        string name
        string email
        string avatar_url
        timestamp email_verified_at
        string password
        int money
        string rememberToken
        string stripe_id
        string pm_type
        string pm_last_four
        timestamp trieal_ends_at
        string created_at
        string updated_at
    }
```