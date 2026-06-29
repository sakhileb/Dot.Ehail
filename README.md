<div align="center">

<img src="docs/logo.svg" alt="Dot.Ehail" width="320" />

<br /><br />

**Request rides, manage drivers, and track trips in real time.**

<br />

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white) ![Livewire](https://img.shields.io/badge/Livewire-3-FB70A9?style=flat-square) ![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-336791?style=flat-square&logo=postgresql&logoColor=white)

<br /><br />

**Part of the [InfoDot Ecosystem](https://github.com/sakhileb/InfoDot)** &nbsp;·&nbsp; `ehail.infodot.app`

</div>

---

## What is Dot.Ehail?

Dot.Ehail is the ride-hailing platform in the InfoDot ecosystem. Operators manage a fleet of drivers and vehicles; passengers request rides and track their driver in real time — with AI-powered fare estimation and automated dispatch routing.

## Core Features

- Passenger app flow — request, match, track, and pay
- Driver management — onboarding, documents, and availability
- Vehicle registry — linked to drivers with inspection records
- Real-time trip tracking via Reverb and geolocation
- AI fare estimation based on distance and demand
- Automated dispatch with nearest-driver matching
- Trip history and rating system for drivers and passengers
- Ecosystem SSO from InfoDot hub

## Domain Models

- **Driver** — registered driver with license and status
- **Vehicle** — linked to a driver with plate and type
- **Trip** — ride record from pickup to destination
- **TripRating** — post-trip score and review

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 |
| Language | PHP 8.4 |
| Frontend | Livewire 3 · Alpine.js 3 · Tailwind CSS |
| Database | PostgreSQL 16 (shared across ecosystem) |
| Realtime | Laravel Reverb |
| Auth | Laravel Sanctum (InfoDot SSO) |
| AI | Anthropic Claude (`claude-sonnet-4-6`) |
| Storage | AWS S3 / Local (Flysystem) |
| Search | Laravel Scout · Meilisearch |
| Queue | Redis · Laravel Horizon |

## Quick Start

```bash
git clone https://github.com/sakhileb/Dot.Ehail.git
cd Dot.Ehail
cp .env.example .env
composer install
npm install && npm run build
php artisan key:generate
php artisan migrate
php artisan serve
```

> **Ecosystem SSO:** Set `DB_*` env vars to the shared InfoDot PostgreSQL instance and `APP_URL=https://ehail.infodot.app`. Users authenticated through InfoDot gain access automatically via Sanctum handoff tokens.

## Ecosystem

**Dot.Ehail** is one of **21 platforms** in the InfoDot ecosystem, connected via shared PostgreSQL and Sanctum SSO. Visit [InfoDot](https://github.com/sakhileb/InfoDot) to explore the full platform map.

## License

MIT © [SK Digital / BluPin Incorporated](https://github.com/sakhileb)
