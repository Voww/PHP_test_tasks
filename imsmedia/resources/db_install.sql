DROP SCHEMA ims_media_stock;
CREATE SCHEMA IF NOT EXISTS ims_media_stock DEFAULT CHARACTER SET 'utf8' DEFAULT COLLATE 'utf8_general_ci';
# SET NAMES 'cp1251';
USE ims_media_stock;

-- DROP TABLE category;
CREATE TABLE IF NOT EXISTS category (
  code VARCHAR(64) NOT NULL UNIQUE,
  name VARCHAR(256),
  parent_category_id VARCHAR(64),
  PRIMARY KEY (code)#,
#   FOREIGN KEY (parent_category_id)
#     REFERENCES category (code)
#     ON DELETE RESTRICT ON UPDATE CASCADE
);

-- DROP TABLE product;
CREATE TABLE IF NOT EXISTS product (
  code VARCHAR(64) NOT NULL UNIQUE,
  articul VARCHAR(64),
  name VARCHAR(256),
  basic_measurement_unit_id BIGINT UNSIGNED,
  price DECIMAL(10, 2),
  currency_id BIGINT UNSIGNED,
  measurement_unit_id BIGINT UNSIGNED,
  parent_category_id VARCHAR(64),
  PRIMARY KEY (code)#,
#   FOREIGN KEY (basic_measurement_unit_id)
#     REFERENCES measurement (id)
#     ON DELETE RESTRICT ON UPDATE CASCADE,
#   FOREIGN KEY (currency_id)
#     REFERENCES currency (id)
#     ON DELETE RESTRICT ON UPDATE CASCADE,
#   FOREIGN KEY (measurement_unit_id)
#     REFERENCES measurement (id)
#     ON DELETE RESTRICT ON UPDATE CASCADE,
#   FOREIGN KEY (parent_category_id)
#     REFERENCES category (code)
#     ON DELETE RESTRICT ON UPDATE CASCADE
);

-- DROP TABLE measurement;
CREATE TABLE IF NOT EXISTS measurement (
  id SERIAL,
  code VARCHAR(64) NOT NULL UNIQUE,
  PRIMARY KEY (id)
)
;

-- DROP TABLE currency;
CREATE TABLE IF NOT EXISTS currency (
  id SERIAL,
  code VARCHAR(64) NOT NULL UNIQUE,
  PRIMARY KEY (id)
);