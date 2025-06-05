<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['checkout']);
    }

    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Destination::search($query);
        $recommendations = Destination::getRecommendations($query);

        return view('search-results', [
            'results' => $results,
            'recommendations' => $recommendations,
            'query' => $query
        ]);
    }

    public function seedDummyData()
    {
        $defaultImage = 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6';
        
        $destinations = [
            // Beaches
            [
                'name' => 'Pink Beach',
                'location' => 'Komodo National Park, East Nusa Tenggara',
                'description' => 'One of only seven pink beaches in the world, this unique destination offers crystal clear waters, vibrant coral reefs, and pink-tinted sand from red coral fragments.',
                'rating' => 4.8,
                'price' => 250000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Pink sand beach', 'Snorkeling', 'Diving', 'Coral reefs']),
                'category' => 'beach',
            ],
            [
                'name' => 'Nusa Penida',
                'location' => 'Klungkung Regency, Bali',
                'description' => 'Famous for its stunning cliffs, crystal clear waters, and the iconic Kelingking Beach shaped like a T-Rex. Perfect for photography and beach activities.',
                'rating' => 4.9,
                'price' => 350000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Kelingking Beach', 'Angels Billabong', 'Snorkeling', 'Crystal Bay']),
                'category' => 'beach',
            ],
            [
                'name' => 'Nihiwatu Beach',
                'location' => 'Sumba, East Nusa Tenggara',
                'description' => 'Once voted as the best beach in the world, this exclusive paradise offers pristine white sand, world-class surfing, and luxury eco-resorts.',
                'rating' => 4.9,
                'price' => 850000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Surfing', 'Luxury resorts', 'Private beach', 'Sunset views']),
                'category' => 'beach',
            ],

            // Mountains
            [
                'name' => 'Mount Bromo',
                'location' => 'East Java',
                'description' => 'An active volcano offering spectacular sunrise views, vast desert plains, and a chance to witness the traditional Kasada ceremony of the Tengger people.',
                'rating' => 4.9,
                'price' => 450000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Sunrise viewpoint', 'Horseback riding', 'Desert plains', 'Crater viewing']),
                'category' => 'mountain',
            ],
            [
                'name' => 'Mount Rinjani',
                'location' => 'Lombok, West Nusa Tenggara',
                'description' => 'Indonesias second-highest volcano featuring a crater lake, hot springs, and challenging trekking routes with breathtaking views.',
                'rating' => 4.7,
                'price' => 550000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Segara Anak Lake', 'Hot springs', 'Trekking routes', 'Camping']),
                'category' => 'mountain',
            ],
            [
                'name' => 'Mount Ijen',
                'location' => 'Banyuwangi, East Java',
                'description' => 'Famous for its ethereal blue fire phenomenon and the worlds largest acidic lake, surrounded by a landscape of volcanic cones.',
                'rating' => 4.8,
                'price' => 400000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Blue fire', 'Crater lake', 'Sulfur mining', 'Night trekking']),
                'category' => 'mountain',
            ],

            // Cultural Sites
            [
                'name' => 'Borobudur Temple',
                'location' => 'Magelang, Central Java',
                'description' => 'The worlds largest Buddhist temple, this UNESCO World Heritage site features intricate stone carvings and offers stunning sunrise views over the Javanese landscape.',
                'rating' => 4.9,
                'price' => 350000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Sunrise tour', 'Buddhist architecture', 'Stone reliefs', 'Cultural guides']),
                'category' => 'cultural',
            ],
            [
                'name' => 'Prambanan Temple',
                'location' => 'Yogyakarta Special Region',
                'description' => 'The largest Hindu temple complex in Indonesia, known for its tall and pointed architecture, dedicated to the Trimurti: Shiva, Vishnu, and Brahma.',
                'rating' => 4.8,
                'price' => 300000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Hindu architecture', 'Ramayana Ballet', 'Sunset views', 'Guided tours']),
                'category' => 'cultural',
            ],
            [
                'name' => 'Tanah Lot Temple',
                'location' => 'Tabanan, Bali',
                'description' => 'Ancient Hindu temple perched on a rocky outcrop in the sea, offering spectacular sunset views and cultural performances.',
                'rating' => 4.7,
                'price' => 250000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Ocean temple', 'Sunset views', 'Cultural shows', 'Holy snake temple']),
                'category' => 'cultural',
            ],

            // Wildlife
            [
                'name' => 'Tanjung Puting National Park',
                'location' => 'Central Kalimantan',
                'description' => 'Home to orangutans and other wildlife, this park offers river cruises through pristine rainforest and visits to orangutan rehabilitation centers.',
                'rating' => 4.8,
                'price' => 750000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Orangutan viewing', 'River cruises', 'Rainforest trekking', 'Wildlife photography']),
                'category' => 'wildlife',
            ],
            [
                'name' => 'Komodo National Park',
                'location' => 'East Nusa Tenggara',
                'description' => 'Home to the famous Komodo dragons, this UNESCO World Heritage site offers unique wildlife encounters, diving, and pristine beaches.',
                'rating' => 4.9,
                'price' => 650000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Komodo dragons', 'Diving', 'Pink Beach', 'Island hopping']),
                'category' => 'wildlife',
            ],
            [
                'name' => 'Way Kambas National Park',
                'location' => 'Lampung, Sumatra',
                'description' => 'A sanctuary for Sumatran elephants and rhinos, offering elephant training center visits and night safari experiences.',
                'rating' => 4.6,
                'price' => 500000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Elephant sanctuary', 'Night safari', 'Bird watching', 'River tours']),
                'category' => 'wildlife',
            ],

            // Waterfalls
            [
                'name' => 'Tumpak Sewu Waterfall',
                'location' => 'Lumajang, East Java',
                'description' => 'Also known as Coban Sewu, this spectacular waterfall is surrounded by lush greenery and offers a panoramic view of multiple waterfalls in a horseshoe formation.',
                'rating' => 4.7,
                'price' => 150000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Multiple waterfalls', 'Hiking trails', 'Photography spots', 'Natural pools']),
                'category' => 'waterfall',
            ],
            [
                'name' => 'Tegenungan Waterfall',
                'location' => 'Gianyar, Bali',
                'description' => 'A majestic waterfall surrounded by lush greenery, perfect for swimming and photography, located just 30 minutes from Ubud.',
                'rating' => 4.6,
                'price' => 200000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Swimming area', 'Photo spots', 'Cafe viewpoint', 'Easy access']),
                'category' => 'waterfall',
            ],
            [
                'name' => 'Madakaripura Waterfall',
                'location' => 'Probolinggo, East Java',
                'description' => 'The tallest waterfall in Java and second tallest in Indonesia, surrounded by seven other waterfalls in a mystical valley.',
                'rating' => 4.8,
                'price' => 175000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Towering falls', 'Ancient legends', 'Cave exploration', 'Rainforest trek']),
                'category' => 'waterfall',
            ],

            // Islands
            [
                'name' => 'Raja Ampat Islands',
                'location' => 'West Papua',
                'description' => 'A paradise for divers and nature lovers, featuring the worlds richest marine biodiversity, pristine beaches, and stunning island landscapes.',
                'rating' => 4.9,
                'price' => 1500000,
                'image_url' => $defaultImage,
                'features' => json_encode(['World-class diving', 'Marine biodiversity', 'Island hopping', 'Traditional villages']),
                'category' => 'island',
            ],
            [
                'name' => 'Belitung Island',
                'location' => 'Bangka Belitung Islands',
                'description' => 'Known for its pristine white beaches, granite rock formations, and traditional fishing villages, made famous by the movie Laskar Pelangi.',
                'rating' => 4.7,
                'price' => 400000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Tanjung Kelayang Beach', 'Granite rocks', 'Lighthouse', 'Snorkeling']),
                'category' => 'island',
            ],
            [
                'name' => 'Wakatobi Islands',
                'location' => 'Southeast Sulawesi',
                'description' => 'A remote paradise comprising four main islands, offering world-class diving, pristine beaches, and unique marine life.',
                'rating' => 4.8,
                'price' => 1200000,
                'image_url' => $defaultImage,
                'features' => json_encode(['Coral reefs', 'Remote beaches', 'Traditional culture', 'Marine sanctuary']),
                'category' => 'island',
            ],
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }

        return response()->json(['message' => 'Dummy data seeded successfully']);
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.detail', compact('destination'));
    }

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'ticket_quantity' => 'required|integer|min:1',
            'visit_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:visit_date',
        ]);

        $destination = Destination::findOrFail($request->destination_id);
        $start_date = \Carbon\Carbon::parse($validated['visit_date']);
        $end_date = \Carbon\Carbon::parse($validated['end_date']);
        $duration = $end_date->diffInDays($start_date) + 1;

        return view('checkout', [
            'booking' => array_merge($validated, ['duration' => $duration]),
            'destination' => $destination,
            'end_date' => $end_date
        ]);
    }
}



