CREATE TABLE Properties (
	uuid VARCHAR(50) NOT NULL PRIMARY KEY,
	county VARCHAR(50),
	country VARCHAR(50),
	town VARCHAR(50),
	description TEXT,
	address VARCHAR(50),
	imageFull VARCHAR(50),
	imageThumbnail VARCHAR(50),
	numBedrooms INT(6),
	numBathrooms INT(6),
	price INT(6),
	propertyType INT(6),
	propertyStatus INT(6),
	create_at VARCHAR(50),
	update_at VARCHAR(50)
)
