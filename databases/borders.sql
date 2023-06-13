USE borders;
CREATE TABLE countries (
    country VARCHAR(100) NOT NULL,
    borders TEXT NOT NULL
);
INSERT INTO countries (country, borders) VALUES
    ('Germany', 'Austria, Belgium, Czech Republic, Denmark, France, Luxembourg, Netherlands, Poland, Switzerland'),
    ('France', 'Andorra, Belgium, Germany, Italy, Luxembourg, Monaco, Spain, Switzerland'),
    ('Italy', 'Austria, France, San Marino, Slovenia, Switzerland, Vatican City');
