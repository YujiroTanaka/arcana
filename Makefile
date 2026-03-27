.PHONY: up down build restart logs migrate shell

# コンテナ起動
up:
	docker compose up -d

# コンテナ停止
down:
	docker compose down

# イメージビルド（初回・Dockerfile変更時）
build:
	docker compose up -d --build

# 再起動
restart:
	docker compose restart

# ログ確認
logs:
	docker compose logs -f

# マイグレーション実行
migrate:
	docker compose exec app php artisan migrate

# PHPコンテナに入る
shell:
	docker compose exec app bash

# Laravel キャッシュクリア
cache-clear:
	docker compose exec app php artisan cache:clear
	docker compose exec app php artisan config:clear
	docker compose exec app php artisan view:clear
