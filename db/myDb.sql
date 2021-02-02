CREATE TABLE storageLocations (
	storage_item_id SERIAL PRIMARY KEY,
	storage_room VARCHAR NOT NULL,
	storage_rack VARCHAR,
	storage_shelf INT,
	storage_notes VARCHAR
);

INSERT INTO storageLocations(storage_room, storage_rack, storage_shelf, storage_notes)
	VALUES
		('James Office', 'Floor', 0, 'Floor'),
		('Ethan Office', 'A', 0, NULL),
		('Ethan Office', 'B', 0, NULL),
		('Ethan Office', 'C', 0, NULL),	
		('Back Room', 'A', 0, NULL),
		('Back Room', 'A', 1, NULL),
		('Back Room', 'A', 2, NULL)
		('Warehouse', 'G', 3, NULL);		


CREATE TABLE supportStaff (
	support_staff_id SERIAL PRIMARY KEY,
	support_staff_name VARCHAR NOT NULL
);

INSERT INTO supportStaff(support_staff_name)
	VALUES
		('Ethan'),
		('James');

CREATE TABLE strataInventory (
	item_id SERIAL PRIMARY KEY,
	item_sticker_id INT,
	item_name VARCHAR NOT NULL,
	item_description VARCHAR,
	item_quantity INT NOT NULL,
	item_storage_location INT NOT NULL,
	item_purchase_date DATE,
	item_checked_out BOOLEAN NOT NULL,
	item_checked_out_date DATE,
	item_checked_out_by INT,

	FOREIGN KEY (item_storage_location) REFERENCES storageLocations(storage_item_id),
	FOREIGN KEY (item_checked_out_by) REFERENCES supportStaff(support_staff_id)
);

INSERT INTO strataInventory(item_sticker_id, item_name, item_description, item_quantity, item_storage_location, item_checked_out)
	VALUES
		(1034, 'Dell Latitude 3400', 'Ethan Laptop', 1, 2, TRUE),
		(1035, 'Dell Latitude 3500', 'James Laptop', 1, 1, TRUE),
		(1036, 'Dell Latitude 3600', 'Steve Laptop', 1, 5, TRUE);



CREATE TABLE spectraInventory (
	item_id SERIAL PRIMARY KEY,
	item_name VARCHAR NOT NULL,
	item_description VARCHAR,
	item_quantity INT NOT NULL,
	item_storage_location INT NOT NULL,
	item_owner VARCHAR,
	item_purchase_date DATE,
	item_checked_out BOOLEAN,
	item_checked_out_date DATE,
	item_checked_out_by INT,

	FOREIGN KEY (item_storage_location) REFERENCES storageLocations(storage_item_id),
	FOREIGN KEY (item_checked_out_by) REFERENCES supportStaff(support_staff_id)
);

INSERT INTO spectraInventory(item_name, item_description, item_quantity, item_storage_location, item_checked_out)
	VALUES
		('Polycom VFX 3000', 'Phone system', 20, 8, FALSE),
		('Meraki Switch', 'Networking Switch', 3, 8, FALSE);
		

