-- Create Table: groups
--------------------------------------------------------------------------------
CREATE TABLE groups
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250)  NULL 
	,`created` VARCHAR(250)  NULL 
	,`modified` VARCHAR(250)  NULL 
)
ENGINE=INNODB



-- Create Table: unity_sectors
--------------------------------------------------------------------------------
CREATE TABLE unity_sectors
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`unity_id` INT NOT NULL 
	,`sector_id` INT NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: sectors
--------------------------------------------------------------------------------
CREATE TABLE sectors
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: expense_groups
--------------------------------------------------------------------------------
CREATE TABLE expense_groups
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`description` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: functional_units
--------------------------------------------------------------------------------
CREATE TABLE functional_units
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`description` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: health_districts
--------------------------------------------------------------------------------
CREATE TABLE health_districts
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250)  NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: unity_types
--------------------------------------------------------------------------------
CREATE TABLE unity_types
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: areas
--------------------------------------------------------------------------------
CREATE TABLE areas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250)  NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: cities
--------------------------------------------------------------------------------
CREATE TABLE cities
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`keycode` INT NOT NULL 
	,`name` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: regions
--------------------------------------------------------------------------------
CREATE TABLE regions
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`city_id` INT NOT NULL 
	,`area_id` INT NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: unities
--------------------------------------------------------------------------------
CREATE TABLE unities
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`cnes` VARCHAR(250) NOT NULL 
	,`cnpj` VARCHAR(250) NOT NULL 
	,`name` VARCHAR(250) NOT NULL 
	,`trade_name` VARCHAR(250)  NULL 
	,`address` VARCHAR(250)  NULL 
	,`number` VARCHAR(250)  NULL 
	,`cep` VARCHAR(250)  NULL 
	,`phone` VARCHAR(250)  NULL 
	,`fax` VARCHAR(250)  NULL 
	,`region_id` INT NOT NULL 
	,`health_district_id` INT NOT NULL 
	,`unity_type_id` INT NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: group_types
--------------------------------------------------------------------------------
CREATE TABLE group_types
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: item_groups
--------------------------------------------------------------------------------
CREATE TABLE item_groups
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`keycode` VARCHAR(250) NOT NULL 
	,`name` VARCHAR(250) NOT NULL 
	,`group_type_id` INT NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: item_classes
--------------------------------------------------------------------------------
CREATE TABLE item_classes
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`item_group_id` INT NOT NULL 
	,`keycode` VARCHAR(250) NOT NULL 
	,`name` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: input_categories
--------------------------------------------------------------------------------
CREATE TABLE input_categories
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`description` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: input_subcategories
--------------------------------------------------------------------------------
CREATE TABLE input_subcategories
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`description` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: inputs
--------------------------------------------------------------------------------
CREATE TABLE inputs
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`input_category_id` INT NOT NULL 
	,`input_subcategory_id` INT  NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: pngc_codes
--------------------------------------------------------------------------------
CREATE TABLE pngc_codes
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`keycode` VARCHAR(250) NOT NULL 
	,`expense_group_id` INT NOT NULL 
	,`functional_unit_id` INT NOT NULL 
	,`input_id` INT NOT NULL 
	,`measure_type_id` INT NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: measure_types
--------------------------------------------------------------------------------
CREATE TABLE measure_types
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`name` VARCHAR(250) NOT NULL 
	,`description` VARCHAR(250) NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: items
--------------------------------------------------------------------------------
CREATE TABLE items
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`item_class_id` INT NOT NULL 
	,`pngc_code_id` INT NOT NULL 
	,`name` VARCHAR(250) NOT NULL 
	,`description` VARCHAR(250) NOT NULL 
	,`image_path` VARCHAR(250)  NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: employees
--------------------------------------------------------------------------------
CREATE TABLE employees
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`registration` INT NOT NULL 
	,`name` VARCHAR(250) NOT NULL 
	,`birth_date` DATETIME  NULL 
	,`email` VARCHAR(250)  NULL 
	,`phone` VARCHAR(250)  NULL 
	,`rg` VARCHAR(250)  NULL 
	,`cpf` VARCHAR(250)  NULL 
	,`voter_card` VARCHAR(250)  NULL 
	,`ctps` VARCHAR(250)  NULL 
	,`reservist` VARCHAR(250)  NULL 
	,`agency` VARCHAR(250)  NULL 
	,`account` VARCHAR(250)  NULL 
	,`unity_sector_id` INT NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Table: users
--------------------------------------------------------------------------------
CREATE TABLE users
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`employee_id` INT NOT NULL 
	,`username` VARCHAR(250)  NULL 
	,`password` VARCHAR(250)  NULL 
	,`group_id` INT NOT NULL 
	,`created` DATETIME  NULL 
	,`modified` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Foreign Key: items.pngc_code_id -> pngc_codes.id
ALTER TABLE items ADD FOREIGN KEY (pngc_code_id) REFERENCES pngc_codes(id);


-- Create Foreign Key: unity_sectors.sector_id -> sectors.id
ALTER TABLE unity_sectors ADD FOREIGN KEY (sector_id) REFERENCES sectors(id);


-- Create Foreign Key: users.group_id -> groups.id
ALTER TABLE users ADD FOREIGN KEY (group_id) REFERENCES groups(id);


-- Create Foreign Key: employees.unity_sector_id -> unity_sectors.id
ALTER TABLE employees ADD FOREIGN KEY (unity_sector_id) REFERENCES unity_sectors(id);


-- Create Foreign Key: pngc_codes.expense_group_id -> expense_groups.id
ALTER TABLE pngc_codes ADD FOREIGN KEY (expense_group_id) REFERENCES expense_groups(id);


-- Create Foreign Key: unity_sectors.unity_id -> unities.id
ALTER TABLE unity_sectors ADD FOREIGN KEY (unity_id) REFERENCES unities(id);


-- Create Foreign Key: pngc_codes.measure_type_id -> measure_types.id
ALTER TABLE pngc_codes ADD FOREIGN KEY (measure_type_id) REFERENCES measure_types(id);


-- Create Foreign Key: pngc_codes.input_id -> inputs.id
ALTER TABLE pngc_codes ADD FOREIGN KEY (input_id) REFERENCES inputs(id);


-- Create Foreign Key: inputs.input_subcategory_id -> input_subcategories.id
ALTER TABLE inputs ADD FOREIGN KEY (input_subcategory_id) REFERENCES input_subcategories(id);


-- Create Foreign Key: inputs.input_category_id -> input_categories.id
ALTER TABLE inputs ADD FOREIGN KEY (input_category_id) REFERENCES input_categories(id);


-- Create Foreign Key: item_classes.item_group_id -> item_groups.id
ALTER TABLE item_classes ADD FOREIGN KEY (item_group_id) REFERENCES item_groups(id);


-- Create Foreign Key: items.item_class_id -> item_classes.id
ALTER TABLE items ADD FOREIGN KEY (item_class_id) REFERENCES item_classes(id);


-- Create Foreign Key: regions.city_id -> cities.id
ALTER TABLE regions ADD FOREIGN KEY (city_id) REFERENCES cities(id);


-- Create Foreign Key: regions.area_id -> areas.id
ALTER TABLE regions ADD FOREIGN KEY (area_id) REFERENCES areas(id);


-- Create Foreign Key: unities.region_id -> regions.id
ALTER TABLE unities ADD FOREIGN KEY (region_id) REFERENCES regions(id);


-- Create Foreign Key: item_groups.group_type_id -> group_types.id
ALTER TABLE item_groups ADD FOREIGN KEY (group_type_id) REFERENCES group_types(id);


-- Create Foreign Key: unities.unity_type_id -> unity_types.id
ALTER TABLE unities ADD FOREIGN KEY (unity_type_id) REFERENCES unity_types(id);


-- Create Foreign Key: pngc_codes.functional_unit_id -> functional_units.id
ALTER TABLE pngc_codes ADD FOREIGN KEY (functional_unit_id) REFERENCES functional_units(id);


-- Create Foreign Key: users.employee_id -> employees.id
ALTER TABLE users ADD FOREIGN KEY (employee_id) REFERENCES employees(id);


-- Create Foreign Key: unities.health_district_id -> health_districts.id
ALTER TABLE unities ADD FOREIGN KEY (health_district_id) REFERENCES health_districts(id);


