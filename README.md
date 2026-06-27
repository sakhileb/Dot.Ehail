<div align="center">

<img src="public/dot_ehail.png" alt="Dot.Ehail" width="280" />

<h1>Dot.Ehail</h1>

<p>E-hailing platform — request rides, manage drivers and vehicles, and track trips in real time.</p>

[![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-4E56A6?style=flat-square)](https://livewire.laravel.com)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-4169E1?style=flat-square&logo=postgresql&logoColor=white)](https://postgresql.org)
[![Tests](https://img.shields.io/badge/tests-37%20passing-brightgreen?style=flat-square)](tests/)
[![License](https://img.shields.io/badge/license-MIT-green?style=flat-square)](LICENSE)

</div>

---

## Overview

Dot.Ehail is the e-hailing and ride management platform in the Dot ecosystem. Riders request trips, drivers accept and navigate to pick-up, and the full ride lifecycle — from request to payment — is tracked with real-time status updates via Laravel Reverb.

---

## Features

- **Ride requests** — riders set pickup and drop-off coordinates with vehicle type preference
- **Driver management** — driver profiles with vehicle info, licence, and availability status
- **Vehicle types** — economy, standard, premium, SUV
- **7-state ride lifecycle** — requested → accepted → en_route → arrived → in_progress → completed → cancelled
- **Fare calculation** — base fare, per-km rate, and surge multiplier stored per ride
- **Ratings** — post-ride ratings for both driver and rider
- **Real-time tracking** — location updates via Reverb WebSockets
- **Ecosystem SSO** — authenticate from InfoDot with a single click

---

## Domain Model

```
DriverProfile → Vehicles (economy/standard/premium/suv)
             → Rides (full lat/lng, 7-state status, fare fields)
             → RideRatings
User (rider)  → Rides
```

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 + PHP 8.4 |
| Frontend | Livewire 3 + Alpine.js + Tailwind CSS |
| Auth | Jetstream 5 + Sanctum (ecosystem SSO) |
| Database | PostgreSQL 16 (shared infodot instance) |
| Maps | Leaflet.js |
| WebSockets | Laravel Reverb (real-time tracking) |
| Payments | Laravel Cashier + Stripe |

---

## Quick Start

```bash
git clone https://github.com/sakhileb/Dot.Ehail.git && cd Dot.Ehail
composer install && npm install
cp .env.example .env && php artisan key:generate
php artisan migrate && npm run dev & php artisan serve
php artisan reverb:start   # Real-time location updates
```

```bash
bash bin/test.sh   # 37 passing, 0 failed, 7 skipped
```

---

## Part of the Dot Ecosystem

Dot.Ehail connects to [InfoDot](https://github.com/sakhileb/InfoDot) — the central hub. Log in to InfoDot once and navigate here without re-authenticating via `/auth/ecosystem`.

---

MIT — © SK Digital / BluPin Incorporated
