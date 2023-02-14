
DROP DATABASE IF EXISTS fastfoodies;
CREATE DATABASE fastfoodies;
USE fastfoodies;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	UNIQUE KEY (email),
    CHECK (email REGEXP '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$')
);

CREATE TABLE restaurants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    res_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE restaurants
ADD res_email VARCHAR(255) NOT NULL UNIQUE,
ADD uniquecode INT NOT NULL unique; 

CREATE TABLE menus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    menu_id INT NOT NULL,
    status ENUM('pending', 'confirmed', 'delivered', 'cancelled') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
    UNIQUE KEY (user_id, restaurant_id, menu_id),
    INDEX (user_id),
    INDEX (restaurant_id),
    INDEX (menu_id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    menu_id INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE
);

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('credit_card', 'debit_card', 'paypal', 'cash') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
     INDEX (order_id)
);



START TRANSACTION;

INSERT INTO users (fname, lname, email, password, address) 
VALUES ('simon', 'junior', 'junior@gmail.com', '123 Main St');

INSERT INTO users (fname, lname, email, password, address) 
VALUES 
('John', 'Doe', 'johndoe@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '123 Main St'),
('Jane', 'Doe', 'janedoe@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '456 Elm St'),
('Jim', 'Smith', 'jimsmith@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '789 Oak St'),
('Jane', 'Smith', 'janesmith@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '987 Pine St'),
('Jack', 'Johnson', 'jackjohnson@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '654 Cedar St'),
('Jill', 'Johnson', 'jilljohnson@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '321 Maple St'),
('James', 'Brown', 'jamesbrown@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '654 Cedar St'),
('Janet', 'Brown', 'janetbrown@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '987 Pine St'),
('Joe', 'Davis', 'joedavis@email.com', '$2y$10$1WgKfZptJxqo9n9rLnYzQOufoMrwHJE1LnBDPWZJ1zZxlx98QPJ9W', '123 Main St'),
('Jessica', 'Davis', 'jessicadavis@email.com', '$2y$10', '986 cantonment');

-- Users
INSERT INTO users (fname, lname, email, password, address) VALUES
("John", "Doe", "johndoe1@email.com", SHA2("password1", 256), "123 Main St"),
("Jane", "Doe", "janedoe1@email.com", SHA2("password2", 256), "456 Main St"),
("Jim", "Smith", "jimsmith1@email.com", SHA2("password3", 256), "789 Main St"),
("Sarah", "Johnson", "sarahjohnson1@email.com", SHA2("password4", 256), "246 Main St"),
("Tom", "Brown", "tombrown1@email.com", SHA2("password5", 256), "369 Main St"),
("Amy", "Williams", "amywilliams1@email.com", SHA2("password6", 256), "159 Main St"),
("Michael", "Jones", "michaeljones1@email.com", SHA2("password7", 256), "753 Main St"),
("Emily", "Davis", "emilydavis1@email.com", SHA2("password8", 256), "951 Main St"),
("William", "Martin", "williammartin1@email.com", SHA2("password9", 256), "147 Main St"),
("Ashley", "Anderson", "ashleyanderson1@email.com", SHA2("password10", 256), "753 Main St");

-- Restaurants
INSERT INTO restaurants (name, address, phone_number) VALUES
("McDonald's", "111 Main St", "111-111-1111"),
("Burger King", "222 Main St", "222-222-2222"),
("Wendy's", "333 Main St", "333-333-3333"),
("Taco Bell", "444 Main St", "444-444-4444"),
("KFC", "555 Main St", "555-555-5555"),
("Pizza Hut", "666 Main St", "666-666-6666"),
("Subway", "777 Main St", "777-777-7777"),
("Dunkin' Donuts", "888 Main St", "888-888-8888"),
("Domino's", "999 Main St", "999-999-9999"),
("Starbucks", "000 Main St", "000-000-0000");

-- Menus
INSERT INTO menus (restaurant_id, name, description, price) VALUES
(1, "Big Mac", "Two 100% beef patties, special sauce, lettuce, cheese, pickles, onions on a sesame seed bun.", 5.99),
(2, "Whopper", "A flame-grilled beef patty topped with juicy tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles, and sliced white onions on a soft sesame seed bun.", 6.49),
(3, "Spicy Chicken Sandwich", "A juicy, breaded chicken patty topped with spicy mayo and served on a bun.", 4.99),
(4, "Crunchwrap Supreme", "A crispy tortilla filled with seasoned beef, warm nacho cheese, a crispy tostada shell, and cool sour cream.", 5.49);


INSERT INTO restaurants (name, address, phone_number)
VALUES
    ('Pizza Palace', '123 Main St', '555-555-5555'),
    ('Burger Joint', '456 Elm St', '555-555-5556'),
    ('Mexican Grill', '789 Oak St', '555-555-5557');

INSERT INTO menus (restaurant_id, name, description, price)
VALUES
    (1, 'Pepperoni Pizza', 'A classic pepperoni pizza with tomato sauce and mozzarella cheese', 15.99),
    (1, 'Margherita Pizza', 'A traditional margherita pizza with tomato sauce, mozzarella cheese and basil', 14.99),
    (2, 'Cheeseburger', 'A juicy beef patty with melted cheese, lettuce, tomato and pickles', 8.99),
    (2, 'Bacon Cheeseburger', 'A juicy beef patty with melted cheese, bacon, lettuce, tomato and pickles', 10.99),
    (3, 'Beef Tacos', 'Three soft tacos with grilled beef, cheese, lettuce, tomato and sour cream', 9.99),
    (3, 'Chicken Quesadilla', 'A large quesadilla filled with grilled chicken and cheese', 11.99);

INSERT INTO orders (user_id, restaurant_id, menu_id, status)
VALUES
    (1, 1, 1, 'confirmed'),
    (1, 2, 2, 'confirmed'),
    (2, 3, 5, 'delivered'),
    (3, 1, 2, 'pending'),
    (3, 3, 6, 'confirmed');

INSERT INTO order_items (order_id, menu_id, quantity)
VALUES
    (1, 1, 1),
    (1, 2, 2),
    (2, 2, 1),
    (2, 3, 2),
    (3, 5, 3),
    (4, 2, 2),
    (5, 6, 1);

INSERT INTO payments (order_id, amount, payment_method)
VALUES
    (1, 25.98, 'credit_card'),
    (2, 23.97, 'debit_card'),
    (3, 29.97, 'paypal'),
    (4, 23.98, 'credit_card'),
    (5, 11.99, 'cash');


INSERT INTO orders (user_id, restaurant_id, menu_id)
VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

INSERT INTO order_items (order_id, menu_id, quantity)
VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

INSERT INTO payments (order_id, amount, payment_method)
VALUES
(1, 20.00, 'credit_card'),
(2, 10.00, 'debit_card'),
(3, 30.00, 'paypal'),
(4, 40.00, 'cash'),
(5, 50.00, 'credit_card');


















select * from orders;
select * from menus;
select * from payments;
select * from users;