<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = \App\Models\Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->unique()->numberBetween(10000, 99999),
            'title' => $this->faker->randomElement([
                "The Great Gatsby",
                "To Kill a Mockingbird",
                "Pride and Prejudice",
                "1984",
                "The Catcher in the Rye",
                "Harry Potter and the Philosopher's Stone",
                "The Lord of the Rings",
                "The Hobbit",
                "The Chronicles of Narnia",
                "The Hunger Games",
                "Brave New World",
                "Animal Farm",
                "The Da Vinci Code",
                "The Alchemist",
                "Gone with the Wind",
                "The Kite Runner",
                "The Girl with the Dragon Tattoo",
                "The Fault in Our Stars",
                "The Help",
                "The Book Thief",
                "Lord of the Flies",
                "Moby-Dick",
                "To Kill a Mockingbird",
                "The Hobbit",
                "The Catcher in the Rye",
                "The Lord of the Rings",
                "The Great Gatsby",
                "Harry Potter and the Chamber of Secrets",
                "Harry Potter and the Prisoner of Azkaban",
                "Harry Potter and the Goblet of Fire",
                "Harry Potter and the Order of the Phoenix",
                "Harry Potter and the Half-Blood Prince",
                "Harry Potter and the Deathly Hallows",
                "The Chronicles of Narnia: The Lion, the Witch, and the Wardrobe",
                "The Chronicles of Narnia: Prince Caspian",
                "The Chronicles of Narnia: The Voyage of the Dawn Treader",
                "The Chronicles of Narnia: The Silver Chair",
                "The Chronicles of Narnia: The Horse and His Boy",
                "The Chronicles of Narnia: The Magician's Nephew",
                "The Chronicles of Narnia: The Last Battle",
                "The Hunger Games",
                "Catching Fire",
                "Mockingjay",
                "The Fault in Our Stars",
                "Looking for Alaska",
                "Paper Towns",
                "An Abundance of Katherines",
                "Turtles All the Way Down",
                "Divergent",
                "Insurgent",
                "Allegiant",
                "The Maze Runner",
                "The Scorch Trials",
                "The Death Cure",
                "The Kill Order",
                "The Giver",
                "Gathering Blue",
                "Messenger",
                "Son",
                "Eragon",
                "Eldest",
                "Brisingr",
                "Inheritance",
                "Twilight",
                "New Moon",
                "Eclipse",
                "Breaking Dawn",
                "The Host",
                "The Girl with the Dragon Tattoo",
                "The Girl Who Played with Fire",
                "The Girl Who Kicked the Hornet's Nest",
                "The Help",
                "The Lovely Bones",
                "Water for Elephants",
                "A Game of Thrones",
                "A Clash of Kings",
                "A Storm of Swords",
                "A Feast for Crows",
                "A Dance with Dragons",
                "A Knight of the Seven Kingdoms",
                "The Name of the Wind",
                "The Wise Man's Fear",
                "The Slow Regard of Silent Things",
                "The Way of Kings",
                "Words of Radiance",
                "Oathbringer",
                "Rhythm of War",
                "The Eye of the World",
                "The Great Hunt",
                "The Dragon Reborn",
                "The Shadow Rising",
                "The Fires of Heaven",
                "Lord of Chaos",
                "A Crown of Swords",
                "The Path of Daggers",
                "Winter's Heart",
                "Crossroads of Twilight",
                "Knife of Dreams",
                "The Gathering Storm",
                "Towers of Midnight",
                "A Memory of Light",
                "The Alchemist",
                "Brida",
                "By the River Piedra I Sat Down and Wept",
                "The Devil and Miss Prym",
                "Eleven Minutes",
                "The Fifth Mountain",
                "The Pilgrimage",
                "The Valkyries",
                "Veronika Decides to Die",
                "Warrior of the Light",
                "Beneath a Scarlet Sky",
                "The Da Vinci Code",
                "Angels & Demons",
                "The Lost Symbol",
                "Inferno",
                "Origin",
                "Digital Fortress",
                "Deception Point",
                "Gone with the Wind",
                "Scarlett",
                "The Kite Runner",
                "A Thousand Splendid Suns",
                "And the Mountains Echoed",
                "The Road",
                "No Country for Old Men",
                "Blood Meridian",
                "All the Pretty Horses",
                "Child of God",
                "Suttree",
                "The Border Trilogy",
                "The Stand",
                "It",
                "The Shining",
                "Misery",
                "Pet Sematary",
                "Carrie",
                "The Dark Tower series",
                "The Green Mile",
                "11/22/63",
                "The Gunslinger",
                "The Drawing of the Three",
                "The Waste Lands",
                "Wizard and Glass",
                "Wolves of the Calla",
                "Song of Susannah",
                "The Dark Tower",
                "The Girl on the Train",
                "Into the Water",
                "The Woman in Cabin 10",
                "Behind Closed Doors",
                "The Couple Next Door",
                "The Silent Patient",
                "The Guest List",
                "Big Little Lies",
                "The Secret History",
                "The Goldfinch",
                "Sharp Objects",
                "Dark Places",
                "The Maze Runner",
                "The Scorch Trials",
                "The Death Cure",
                "The Kill Order",
                "The Fever Code",
                "The Girl with All the Gifts",
                "The Boy on the Bridge",
                "The Fireman",
                "The Passage",
                "The Twelve",
                "The City of Mirrors",
                "American Gods",
                "Neverwhere",
                "Stardust",
                "Anansi Boys",
                "Good Omens",
                "Coraline",
                "The Graveyard Book",
                "Norse Mythology",
                "The Ocean at the End of the Lane",
                "Snow Crash",
                "Cryptonomicon",
                "The Diamond Age",
                "Anathem",
                "Seveneves",
                "Reamde",
                "Fall; or, Dodge in Hell",
                "Neuromancer",
                "Count Zero",
                "Mona Lisa Overdrive",
                "Burning Chrome",
                "Idoru",
                "Virtual Light",
                "All Tomorrow's Parties",
                "Pattern Recognition",
                "Spook Country",
                "Zero History",
                "The Left Hand of Darkness",
                "The Dispossessed",
                "A Wizard of Earthsea",
                "The Tombs of Atuan",
                "The Farthest Shore",
                "Tehanu",
                "Tales from Earthsea",
                "The Other Wind",
                "The Word for World Is Forest",
                "The Lathe of Heaven",
                "Four Ways to Forgiveness",
                "The Telling",
                "The Earthsea Trilogy",
                "A Canticle for Leibowitz",
                "Hyperion",
                "The Fall of Hyperion",
                "Endymion",
                "The Rise of Endymion",
                "Dune",
                "Dune Messiah",
                "Children of Dune",
                "God Emperor of Dune",
                "Heretics of Dune",
                "Chapterhouse: Dune",
                "The War of the Worlds",
                "The Time Machine",
                "The Island of Doctor Moreau",
                "The Invisible Man",
                "The First Men in the Moon",
                "The Sleeper Awakes",
                "The Shape of Things to Come",
                "The Crystal Egg",
                "The Food of the Gods",
                "The War in the Air",
                "The Moonstone",
                "The Woman in White",
                "Armadale",
                "No Name",
                "The Law and the Lady",
                "The Black Robe",
                "Man and Wife",
                "The Moonstone",
                "The Secret Agent",
                "Heart of Darkness",
                "Nostromo",
                "Lord Jim",
                "The Secret Agent",
                "Under Western Eyes",
                "Chance",
                "Victory",
                "The Shadow Line",
                "The Secret Sharer",
                "The Nigger of the 'Narcissus'",
                "Youth",
                "The Arrow of Gold",
                "The Rescue",
                "The Rover",
                "Suspense",
                "VICTORY",
                "The Rover Boys at Big Bear Lake",
                "The Rover Boys at Colby Hall",
                "The Rover Boys on the Farm",
                "The Rover Boys on the Ocean",
                "The Rover Boys on a Hunt",
                "The Rover Boys on the Great Lakes",
                "The Rover Boys out West",
                "The Rover Boys in the Jungle",
                "The Rover Boys on Treasure Isle",
                "The Rover Boys at College",
                "The Rover Boys Down East",
                "The Rover Boys in Camp",
                "The Rover Boys on Snowshoe Island",
                "The Rover Boys under Canvas",
                "The Rover Boys on a Tour",
                "The Rover Boys on the Plains",
                "The Rover Boys in Southern Waters",
                "The Rover Boys on Land and Sea",
                "The Rover Boys in the Mountains",
                "The Rover Boys on the River",
                "The Rover Boys on the Trail",
                "The Rover Boys in Alaska",
                "The Rover Boys in New York",
                "The Rover Boys in Business",
                "The Rover Boys on a Visit to the Farm",
                "The Rover Boys at School",
                "The Rover Boys on Treasure Isle",
                "The Rover Boys in the Air",
                "The Rover Boys under Canvas",
                "The Rover Boys on the Farm",
                "The Rover Boys on Snowshoe Island",
                "The Rover Boys on the Great Lakes",
                "The Rover Boys on a Hunt",
                "The Rover Boys at Big Bear Lake",
                "The Rover Boys at Colby Hall",
                "The Rover Boys on the Ocean",
                "The Rover Boys on a Tour",
                "The Rover Boys on the River",
                "The Rover Boys on Land and Sea",
                "The Rover Boys in the Mountains",
                "The Rover Boys in Southern Waters",
                "The Rover Boys in Alaska",
                "The Rover Boys in New York",
                "The Rover Boys in Business",
                "The Rover Boys at School",
                "The Rover Boys in Camp",
                "The Rover Boys on the Plains",
                "The Rover Boys on the Trail",
                "The Rover Boys Down East",
                "The House of the Seven Gables",
                "The Scarlet Letter",
                "The Blithedale Romance",
                "The Marble Faun",
                "Twice-Told Tales",
                "Mosses from an Old Manse",
                "A Wonder-Book for Girls and Boys",
                "Tanglewood Tales",
                "The House of the Seven Gables",
                "The Scarlet Letter",
                "The Blithedale Romance",
                "The Marble Faun",
                "Twice-Told Tales",
                "Mosses from an Old Manse",
                "A Wonder-Book for Girls and Boys",
                "Tanglewood Tales",
                "Twenty Thousand Leagues Under the Sea",
                "Journey to the Center of the Earth",
                "Around the World in Eighty Days",
                "From the Earth to the Moon",
                "Five Weeks in a Balloon",
                "The Mysterious Island",
                "The Master of the World",
                "Michael Strogoff",
                "Robur the Conqueror",
                "The Fur Country",
                "The Begum's Fortune",
                "The Steam House",
                "The Floating Island",
                "The City in the Sahara",
                "Dick Sands",
                "The Green Ray",
                "Facing the Flag",
                "The Wreck of the Chancellor",
                "The Survivors of the Chancellor",
                "Off on a Comet",
                "The Underground City",
                "The Blockade Runners",
                "The Waif of the Cynthia",
                "The Lighthouse at the End of the World",
                "The Purchase of the North Pole",
                "The Adventures of Captain Hatteras",
                "The Adventures of Pinocchio",
                "The Blue Fairy Book",
                "The Red Fairy Book",
                "The Green Fairy Book",
                "The Yellow Fairy Book",
                "The Grey Fairy Book",
                "The Violet Fairy Book",
                "The Crimson Fairy Book",
                "The Brown Fairy Book",
                "The Orange Fairy Book",
                "The Olive Fairy Book",
                "The Lilac Fairy Book",
                "The Pink Fairy Book",
                "The Arabian Nights",
                "The Three Musketeers",
                "Twenty Years After",
                "The Vicomte de Bragelonne",
                "The Count of Monte Cristo",
                "The Man in the Iron Mask",
                "The Black Tulip",
                "The Corsican Brothers",
                "The Queen's Necklace",
                "Louise de la Valliere",
                "The Forty-Five Guardsmen",
                "Ten Years Later",
                "The Woman in White",
                "The Moonstone",
                "Armadale",
                "No Name",
                "The Law and the Lady",
                "The Black Robe",
                "Man and Wife",
                "The Moonstone",
                "The Secret Agent",
                "Heart of Darkness",
                "Nostromo",
                "Lord Jim",
                "The Secret Agent",
                "Under Western Eyes",
                "Chance",
                "Victory",
                "The Shadow Line",
                "The Secret Sharer",
                "The Nigger of the 'Narcissus'",
                "Youth",
                "The Arrow of Gold",
                "The Rescue",
                "Suspense",
                "VICTORY",
                "The Rover Boys at Big Bear Lake",
                "The Rover Boys at Colby Hall",
                "The Rover Boys on the Farm",
                "The Rover Boys on the Ocean",
                "The Rover Boys on a Hunt",
                "The Rover Boys on the Great Lakes",
                "The Rover Boys out West",
                "The Rover Boys in the Jungle",
                "The Rover Boys on Treasure Isle",
                "The Rover Boys at College",
                "The Rover Boys Down East"]),
            'author' => $this->faker->name,
            'school' => "646dd6d0511b7e8166014913",
        ];
    }
}