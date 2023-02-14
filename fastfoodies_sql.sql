
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

CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    menu_id INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
    UNIQUE KEY (user_id, menu_id),
    INDEX (user_id),
    INDEX (menu_id)
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

-- Menu
INSERT INTO menus (restaurant_id, name, description, price)
VALUES (20, 'Pizza', 'Pepperoni, sausage, and extra cheese', 12.99),
(21, 'Tacos', 'Ground beef, lettuce, and tomato', 6.99),
(22, 'Salad', 'Romaine lettuce, croutons, and parmesan cheese', 7.99),
(20, 'Burger', '100% beef patty with cheese and bacon', 10.99),
(23, 'Fries', 'Freshly cut potatoes', 2.99),
(20, 'Soup', 'Loaded Potato', 3.99),
(21, 'Lasagna', 'Ground beef, ricotta, and marinara sauce', 9.99),
(22, 'Fried Rice', 'Shrimp, egg, and vegetables', 8.99),
(23, 'Wings', 'Jumbo wings served with ranch sauce', 10.99),
(20, 'Grilled Cheese', 'White bread with cheddar cheese', 4.99),
(21, 'Chicken Tenders', 'Crispy chicken tenders served with honey mustard', 8.99),
(22, 'Spaghetti', 'Spaghetti noodles with marinara sauce', 9.99),
(20, 'Calamari', 'Fried squid served with marinara sauce', 9.99),
(23, 'Pancakes', 'Fluffy buttermilk pancakes', 4.99),
(20, 'Omelette', 'Three-egg omelette with cheese', 6.99),
(21, 'Sushi', 'California roll and spicy tuna roll', 13.99),
(22, 'Cheesesteak', 'Thinly sliced steak with melted cheese', 11.99),
(20, 'Fish and Chips', 'Beer-battered cod and french fries', 10.99),
(23, 'Pork Chops', 'Grilled pork chops with mashed potatoes', 12.99),
(20, 'Seafood Pasta', 'Shrimp, scallops, and linguine', 16.99),
(21, 'Quesadilla', 'Grilled flour tortilla with cheese', 5.99),
(22, 'Stir Fry', 'Vegetables and grilled chicken', 8.99),
(20, 'Fajitas', 'Grilled steak, onions, and peppers', 11.99),
(23, 'Pot Roast', 'Slow-cooked beef with potatoes and carrots', 11.99),
(20, 'Mac & Cheese', 'Creamy cheese sauce and elbow macaroni', 7.99),
(21, 'Pho', 'Rice noodles in beef broth', 8.99),
(22, 'Chicken Parmesan', 'Breaded chicken with marinara sauce and mozzarella', 10.99),
(20, 'Chili', 'Ground beef, beans, and spices', 5.99),
(23, 'Cobb Salad', 'Romaine lettuce, bacon, tomato, and hard-boiled egg', 7.99),
(20, 'Ribs', 'St. Louis-style ribs with BBQ sauce', 13.99),
(21, 'Gnocchi', 'Potato dumplings with pesto sauce', 9.99),
(22, 'Tuna Sandwich', 'Albacore tuna salad on wheat bread', 7.99),
(20, 'Avocado Toast', 'Toasted wheat bread with mashed avocado', 5.99),
(23, 'Stuffed Peppers', 'Ground beef, rice, and cheese', 9.99),
(20, 'Bruschetta', 'Grilled bread with diced tomatoes and basil', 4.99),
(21, 'Tofu Stir Fry', 'Fried tofu with vegetables', 8.99),
(22, 'Rolls', 'Sushi rolls with assorted fish', 11.99),
(20, 'Clams', 'Fried clams with tartar sauce', 9.99),
(23, 'Shrimp Scampi', 'Sauteed shrimp in garlic-butter sauce', 14.99);


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