# sistema restobar

# Requisitos

- [PHP](https://www.php.net/) >= 8.1
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [MySQL](https://www.mysql.com/) o cualquier base de datos compatible con Laravel
- Extensiones de PHP requeridas: `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `ctype`, `json`

## Instalacion

### 1 Clona el repositorio en tu maquina local

```bash
git clone https://github.com/black-forest-labs/flux.git
```
### 2 accede al directorio del proyecto
```bash
cd sistema-restobar
```

### 3 instala las dependencias de composer:

```bash
composer install
```

### 4 Instala las dependencias de npm 

```bash
npm install
```

### 5 copia y configura el archivo .env
```bash
cp .env.example .env
```
### 6 Genera la clave de aplicacion

```bash
php artisan key:generate
```
### 7 Ejecuta npm para cargar assets
```bash
npm run dev
```
podras acceder desde el server apache en la carpeta public
