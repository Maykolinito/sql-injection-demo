# Login vulnerable a SQL Injection (fines educativos)

Este proyecto demuestra cómo una mala práctica al construir consultas SQL puede permitir un ataque de **inyección SQL**.

## 🔓 Ejemplo de inyección exitosa

En el campo **usuario** escribe: `' OR '1'='1`  
En **contraseña** cualquier cosa (ej: `x`)

La consulta resultante será:
```sql
SELECT * FROM users WHERE username = '' OR '1'='1' AND password = 'x'
