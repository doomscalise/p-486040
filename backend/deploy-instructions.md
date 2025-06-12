
# 🚀 Istruzioni per Deploy su Hostinger

## 1. Preparazione File

### Carica questi file nella root del tuo hosting Hostinger:
```
/api/
  ├── config/
  │   └── database.php
  ├── blog/
  │   ├── categories.php
  │   ├── articles.php
  │   ├── featured.php
  │   ├── category/[slug].php
  │   └── articles/
  │       ├── slug/[slug].php
  │       └── [id]/view.php
  └── .htaccess
```

## 2. Configurazione Database

### A. Crea il database MySQL su Hostinger:
1. Vai al pannello di controllo Hostinger
2. Sezione "Database" → "MySQL Database"
3. Crea un nuovo database chiamato `gambla_db`
4. Crea un utente dedicato con password sicura
5. Assegna tutti i privilegi al database

### B. Importa lo schema:
1. Usa phpMyAdmin o MySQL command line
2. Importa il file `database/mysql-schema.sql`

## 3. Configurazione Variabili d'Ambiente

### Crea file .env nella root del tuo hosting:
```env
DB_HOST=localhost
DB_NAME=gambla_db
DB_USER=il_tuo_username_db
DB_PASSWORD=la_tua_password_db
SITE_URL=https://tuodominio.com
```

**⚠️ IMPORTANTE:** 
- NON caricare mai il file .env su GitHub
- Assicurati che sia fuori dalla cartella web pubblica
- Usa credenziali database sicure

## 4. Configurazione CORS

Nel file `backend/config/database.php` e `backend/api/.htaccess`:
- Sostituisci `https://gambla.it` con il tuo dominio reale
- Per test in locale usa `http://localhost:5173`

## 5. Test della Configurazione

### Testa gli endpoint API:
```
GET https://tuodominio.com/api/blog/articles
GET https://tuodominio.com/api/blog/categories
GET https://tuodominio.com/api/blog/featured
```

## 6. Configurazione Frontend

### Aggiorna le variabili d'ambiente del frontend:
```env
VITE_API_URL=https://tuodominio.com/api
VITE_DB_HOST=localhost
VITE_DB_USER=il_tuo_username
VITE_DB_PASSWORD=la_tua_password
VITE_DB_NAME=gambla_db
```

## 7. Deploy Frontend

### Se usi Lovable Publishing:
1. Clicca "Publish" in Lovable
2. Configura le variabili d'ambiente nel pannello Lovable

### Se usi hosting Hostinger per frontend:
1. Build del progetto: `npm run build`
2. Carica la cartella `dist/` nella root web
3. Configura le variabili d'ambiente

## 8. Sicurezza Post-Deploy

### Checklist di sicurezza:
- [ ] File .env protetto e non accessibile via web
- [ ] CORS configurato solo per il tuo dominio
- [ ] Database con utente dedicato e privilegi minimi
- [ ] SSL/HTTPS attivato
- [ ] Backup database configurato
- [ ] Monitoraggio errori attivato

## 9. Monitoraggio

### Log da controllare:
- `/var/log/apache2/error.log` (o nginx)
- Log PHP errors
- Log database slow queries

### Test funzionalità:
- [ ] Caricamento articoli blog
- [ ] Navigazione categorie
- [ ] Visualizzazione singoli articoli
- [ ] Newsletter signup
- [ ] Responsive design

## 10. Troubleshooting

### Errori comuni:
- **Database connection failed**: Controlla credenziali .env
- **CORS errors**: Verifica configurazione domini
- **404 su API**: Controlla file .htaccess
- **Slow queries**: Ottimizza indici database
