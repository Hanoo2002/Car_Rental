use Car_Rental;
CREATE TABLE office (
    office_id INT PRIMARY KEY,
    district VARCHAR(50),
    country VARCHAR(50),
    city VARCHAR(50)
);

CREATE TABLE car (
    plate_number VARCHAR(20) PRIMARY KEY,
    year INT,
    model VARCHAR(50),
    color VARCHAR(50),
    office_id INT,
    price DECIMAL(10, 2),
    current_status VARCHAR(50),
    FOREIGN KEY (office_id) REFERENCES office(office_id)
);


CREATE TABLE admin (
    fname VARCHAR(50),
    lname VARCHAR(50),
    SSN VARCHAR(20) PRIMARY KEY,
    office_id INT,
    password VARCHAR(100),
    email VARCHAR(100),
    FOREIGN KEY (office_id) REFERENCES office(office_id)
);


CREATE TABLE customer (
    SSN VARCHAR(20) PRIMARY KEY,
    fname VARCHAR(50),
    lname VARCHAR(50),
    phone_number VARCHAR(20),
    email VARCHAR(100),
    password VARCHAR(100),
    card_number VARCHAR(20)
);


CREATE TABLE rent (
    SSN VARCHAR(20),
    plate_number VARCHAR(20),
    procedure_id VARCHAR(20) PRIMARY KEY,
    start_date DATE,
    end_date DATE,
    amount_paid DECIMAL(10, 2),
    FOREIGN KEY (SSN) REFERENCES customer(SSN),
    FOREIGN KEY (plate_number) REFERENCES car(plate_number)
);


CREATE TABLE pick_up (
    SSN VARCHAR(20),
    plate_number VARCHAR(20),
    procedure_id VARCHAR(20) PRIMARY KEY,
    pickup_hour TIME,
    drop_hour TIME,
    amount_paid DECIMAL(10, 2),
    FOREIGN KEY (SSN) REFERENCES customer(SSN),
    FOREIGN KEY (plate_number) REFERENCES car(plate_number)
);


CREATE TABLE car_status (
    plate_number VARCHAR(20),
    status VARCHAR(50),
    date TIMESTAMP,
    PRIMARY KEY (plate_number, date),
    FOREIGN KEY (plate_number) REFERENCES car(plate_number)
);

CREATE TABLE `procedure` (ssn int, plate_number VARCHAR(20), procedure_id VARCHAR(20) PRIMARY KEY, `procedure` VARCHAR(20), `date` datetime);