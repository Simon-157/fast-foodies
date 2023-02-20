
DROP DATABASE IF EXISTS fastfoodies;
CREATE DATABASE fastfoodies;
USE fastfoodies;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL UNIQUE,
    profileImg VARCHAR(255) DEFAULT 'https://i.pravatar.cc/75',
    user_address VARCHAR(255) NOT NULL DEFAULT("Accra Ghana"),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE restaurants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    res_name VARCHAR(255) NOT NULL,
    res_address VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    res_email VARCHAR(255) NOT NULL UNIQUE,
    uniquecode INT NOT NULL unique,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE menus (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT(11) UNSIGNED NOT NULL,
    food_name VARCHAR(255) NOT NULL,
    food_description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT(11) NOT NULL,
    food_imgUrl VARCHAR(255) NOT NULL,
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


INSERT INTO restaurants (res_name, res_address, phone_number, res_email, uniquecode)
VALUES
('Burger Joint', '123 Main St, Anytown USA', '555-1234', 'burgerjoint@example.com', 1001),
('Pizzeria', '456 First Ave, Anytown USA', '555-5678', 'pizzeria@example.com', 1002),
('Indian Restaurant', '789 Second St, Anytown USA', '555-9012', 'indianrestaurant@example.com', 1003),
('Sushi Bar', '012 Third Ave, Anytown USA', '555-3456', 'sushibar@example.com', 1004),
('Mexican Restaurant', '345 Fourth St, Anytown USA', '555-7890', 'mexicanrestaurant@example.com', 1005);
('Mexican Restaurant', '345 Fourth Arena, Anytown USA', '555-7890', 'mexicanrestaurant@example.com', 1005);

INSERT INTO menus (restaurant_id, name, description, price)
VALUES
(1, 'Cheeseburger', 'Juicy beef patty with melted cheese', 9.99),
(1, 'Fries', 'Crispy and golden fries', 3.99),
(1, 'Milkshake', 'Creamy vanilla milkshake', 4.99),
(2, 'Margherita Pizza', 'Classic pizza with tomato sauce and mozzarella cheese', 12.99),
(2, 'Caesar Salad', 'Romaine lettuce with croutons, parmesan cheese and caesar dressing', 8.99),
(2, 'Garlic Bread', 'Toasty garlic bread with a sprinkle of parsley', 3.99),
(3, 'Chicken Tikka Masala', 'Grilled chicken in creamy tomato sauce', 14.99),
(3, 'Naan Bread', 'Soft and fluffy bread', 2.99),
(3, 'Samosa', 'Crispy pastry filled with spiced vegetables or meat', 5.99),
(4, 'Sushi Roll', 'Assorted fresh fish and vegetables wrapped in rice and seaweed', 16.99);
