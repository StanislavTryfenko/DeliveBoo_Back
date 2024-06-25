<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $dishes = [
            ['name' => 'Pizza Margherita', 'price' => 8.50, 'image' => 'uploads\B4e2O0p1pFMmm5rVbO2XTG57xDZfXP7Y2YbdSnGS.jpg', 'description' => 'Una deliziosa combinazione di impasto sottile, salsa di pomodoro, mozzarella fresca e foglie di basilico.'],

            ['name' => 'Spaghetti alla Carbonara', 'price' => 12.75, 'image' => 'uploads\71rkZN7U8x6r02HJ0miKN1kaEa73ozhlQ3gCfows.jpg', 'description' => 'Un piatto tradizionale romano fatto con spaghetti al dente, guanciale croccante, uova cremose, pecorino romano e una spolverata di pepe nero. '],

            ['name' => 'Insalata Caprese', 'price' => 9.25, 'image' => 'uploads\50pzAUFu67D6Njq3fY1ePCa1Vdadc2wD81yj2H8Y.jpg', 'description' => 'Una fresca combinazione di pomodori maturi, mozzarella di bufala, basilico fresco e un filo di olio extravergine di oliva. Questo piatto è perfetto per antipasti o pranzi leggeri.'],

            ['name' => 'Lasagna alla Bolognese', 'price' => 14.99, 'image' => 'uploads\b6OZSJanH5Gr0TEwf3ub9m9aI5Ud9PZzIRLq9PNs.jpg', 'description' => 'Strati di pasta fresca all\'uovo, ragù di carne alla bolognese, besciamella vellutata e parmigiano grattugiato. Una ricetta ricca e saporita, simbolo della tradizione emiliana, ideale per chi cerca un piatto sostanzioso e avvolgente'],

            ['name' => 'Filetto di Salmone', 'price' => 18.50, 'image' => 'uploads\CNhpDETdGsvyVJL4Qz7jEPS5nbY1KsxAk5Kpyipw.jpg', 'description' => 'Filetto di salmone fresco, cotto alla perfezione e servito con un tocco di limone e un contorno di verdure di stagione. Un piatto leggero e nutriente, esaltato dalla delicatezza del pesce e dalla freschezza degli ingredienti.'],

            ['name' => 'Bistecca Fiorentina', 'price' => 25.00, 'image' => 'uploads\FCZdicG6smWLam8rEB2xxtdNmGPvlnvEL0NY1FJq.jpg', 'description' => 'Un taglio pregiato di carne di manzo, cotto alla griglia e servito al sangue per esaltarne il sapore autentico. Condita con un filo di olio extravergine di oliva e una spolverata di sale grosso.'],

            ['name' => 'Risotto ai Funghi Porcini', 'price' => 16.50, 'image' => 'uploads\cXCwgsGIMhuAHjtT58J32e2uhbc5VePCQ6RB3kQj.jpg', 'description' => 'Riso Carnaroli mantecato con funghi porcini freschi, burro e parmigiano reggiano. Un piatto cremoso e aromatico, che celebra i sapori intensi dei boschi italiani.'],

            ['name' => 'Tortellini in Brodo', 'price' => 10.99, 'image' => 'uploads\2IopuTVcMtRkEk2k7Av0NRn07ZwJH2Hw738fFefO.jpg', 'description' => 'Tortellini fatti a mano, ripieni di carne e serviti in un brodo caldo e saporito. Un classico della tradizione emiliana, che unisce la delicatezza della pasta fresca alla ricchezza del brodo.'],

            ['name' => 'Gnocchi al Pesto', 'price' => 11.25, 'image' => 'uploads\gnocchi-pesto.jpg', 'description' => 'Gnocchi di patate morbidi e leggeri, conditi con un aromatico pesto genovese fatto con basilico fresco, pinoli, aglio, parmigiano e olio extravergine di oliva.'],

            ['name' => 'Tiramisù', 'price' => 7.99, 'image' => 'uploads\2Pk6rsJNnhIrpyn5OYQvhzY7LGiomql2pqSxcT6c.jpg', 'description' => 'Un dolce italiano classico composto da strati di savoiardi imbevuti nel caffè, alternati a una crema di mascarpone leggera e spolverata di cacao amaro. Deliziosamente equilibrato tra dolcezza e intensità, è un finale perfetto per ogni pasto.'],

        ];

        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            foreach ($dishes as $dishData) {
                $dish = new Dish();
                $dish->restaurant_id = $restaurant->id;
                $dish->name = $dishData['name'];
                $dish->price = $dishData['price'];
                $dish->image = $dishData['image'];
                $dish->slug = Str::of($dish->name)->slug('-');
                $dish->description = $dishData['description'];
                $dish->visible = true;
                $dish->save();
            }
        }
    }
}
