CREATE DATABASE IF NOT EXISTS moneyping_app;
USE moneyping_app;

CREATE TABLE IF NOT EXISTS users (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  avatar varchar(255) DEFAULT NULL,
  admin tinyint(1) NOT NULL DEFAULT 0,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users (id, name, email, email_verified_at, password, avatar, admin, remember_token, created_at, updated_at)
VALUES (3, 'admin', 'admin@gmail.com', NULL, '$2y$10$jVZ4g9GpkbXv47pZ5E1HYuTss/WiVmscT.UDFlDBlHJ2cnPsWd/Ne', NULL, 0, NULL, '2023-05-24 03:30:52', '2023-05-24 03:30:52');
