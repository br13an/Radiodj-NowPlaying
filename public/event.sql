CREATE EVENT remove_requests
ON SCHEDULE EVERY 1 HOUR
STARTS CURRENT_TIMESTAMP
ENDS CURRENT_TIMESTAMP + INTERVAL 1 HOUR
DO
   DELETE FROM requests WHERE requested < DATE_SUB(NOW(), INTERVAL 3 HOUR);
