#!/bin/bash

# Chemin vers le binaire mysql
MYSQL_BIN="C:/xampp/mysql/bin/mysql.exe"

# Supprimer la base de données si elle existe
"$MYSQL_BIN" -u root -e "DROP DATABASE IF EXISTS test;"

# Créer la base de données
"$MYSQL_BIN" -u root -e "CREATE DATABASE IF NOT EXISTS test;"

# Utiliser la base de données
"$MYSQL_BIN" -u root test < v1/script_creation_v1.sql
"$MYSQL_BIN" -u root test < v1/script_init_v1.sql
