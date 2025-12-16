# Symfony Fast Track

[![CI](https://github.com/vgdev-prog/symfony-fast-track/actions/workflows/ci.yml/badge.svg)](https://github.com/vgdev-prog/symfony-fast-track/actions/workflows/ci.yml)

A Symfony 7.4 project following the **Symfony Fast Track** book.

## Requirements

- PHP 8.2 or higher
- Composer 2.x
- Symfony CLI
- PostgreSQL (via Docker)

## Installation

1. Clone the repository:
   ```bash
   git clone git@github.com:vgdev-prog/symfony-fast-track.git
   cd symfony-fast-track
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Start Docker services:
   ```bash
   docker-compose up -d
   ```

4. Run database migrations:
   ```bash
   symfony console doctrine:migrations:migrate
   ```

5. Start the development server:
   ```bash
   symfony server:start
   ```

## Development

### Code Quality

This project uses strict code quality tools:

- **PHPStan** (level 9) for static analysis
- **PHP CS Fixer** with @Symfony coding standards

### Available Commands

```bash
# Check code style
composer cs:check

# Fix code style
composer cs:fix

# Run PHPStan analysis
composer phpstan

# Generate PHPStan baseline
composer phpstan:baseline
```

### Running Tests

```bash
# Install test dependencies (if not installed)
composer require symfony/test-pack --dev

# Run tests
symfony php bin/phpunit
```

## Project Structure

```
.
├── config/              # Application configuration
├── migrations/          # Database migrations
├── public/              # Web root (index.php)
├── src/
│   ├── Controller/      # Controllers
│   ├── Entity/          # Doctrine entities
│   ├── Repository/      # Doctrine repositories
│   └── Kernel.php       # Application kernel
├── templates/           # Twig templates
├── var/                 # Cache, logs, uploads
└── vendor/              # Composer dependencies
```

## License

Proprietary
