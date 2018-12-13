CREATE USER 'monitor'@'%' IDENTIFIED BY 'monitorpassword';
GRANT SELECT on sys.* to 'monitor'@'%';
FLUSH PRIVILEGES;

CREATE USER 'playgrounduser'@'%' IDENTIFIED BY 'playgroundpassword';
GRANT ALL PRIVILEGES on playground.* to 'playgrounduser'@'%';
FLUSH PRIVILEGES;

CREATE USER 'easapp'@'%' IDENTIFIED BY 'easapp';
GRANT ALL PRIVILEGES on dbeasapp.* to 'easapp'@'%';
FLUSH PRIVILEGES;