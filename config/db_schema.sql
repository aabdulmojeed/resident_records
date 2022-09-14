--- CRMS v1.0.0

-- Top-level entity for all those who can log in to the system e.g. Admins, Residents
CREATE TABLE IF NOT EXISTS `users`(
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `firstName` TEXT NOT NULL,
    `lastName` TEXT NOT NULL,
    `address` TEXT NULL, -- for co-resident's, this will be linked to their primary resident's address
    `parentRecordID` INTEGER DEFAULT 0, -- co-resident's must have an entry for this
    `occupation` TEXT NOT NULL,
    `primaryPhone` TEXT NOT NULL,
    `alternatePhone` TEXT NULL,
    `username` TEXT NOT NULL,
    `password` TEXT NOT NULL,
    `isActive` INTEGER DEFAULT 1, -- BOOLEAN replacement, stores 1 or 0
    `isAdmin` INTEGER DEFAULT 0, -- BOOLEAN replacement, stores 1 or 0
    `dateCreated` TEXT, -- TIMESTAMP replacement, will store ISO8601 strings ("YYYY-MM-DD HH:MM:SS.SSS")
    `lastUpdated` TEXT -- TIMESTAMP replacement, will store ISO8601 strings ("YYYY-MM-DD HH:MM:SS.SSS")
);

-- Top-level entity for those who don't have access to the system e.g. Labourers
CREATE TABLE IF NOT EXISTS `guests`(
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `firstName` TEXT NOT NULL,
    `lastName` TEXT NOT NULL,
    `address` TEXT NULL, -- for co-resident's, this will be linked to their primary resident's address
    `parentUserFKID` INTEGER NOT NULL,
    `occupation` TEXT NOT NULL,
    `primaryPhone` TEXT NOT NULL,
    `alternatePhone` TEXT NULL,
    `isActive` INTEGER DEFAULT 1, -- BOOLEAN replacement, stores 1 or 0
    `dateCreated` TEXT, -- TIMESTAMP replacement, will store ISO8601 strings ("YYYY-MM-DD HH:MM:SS.SSS")
    `lastUpdated` TEXT, -- TIMESTAMP replacement, will store ISO8601 strings ("YYYY-MM-DD HH:MM:SS.SSS")
    `updatedBy` INTEGER NOT NULL, -- primary responsibility lies with parentUserFKID, Admin can also assist
    FOREIGN KEY (parentUserFKID) REFERENCES users(id) -- all guests must be associated with a User
);