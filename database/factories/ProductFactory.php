<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    protected array $namesByCategory = [
        'Bières artisanales' => ['Blonde du Moulin', 'Triple Ardennaise', 'Ambrée des Fagnes', 'Stout Liégeois', 'IPA Forestière', 'Saison Wallonne', 'Blanche de Namur', 'Porter Brumeuse', 'Kriek Artisanale', 'Rousse du Terroir'],
        'Bijoux & Accessoires faits main' => ['Collier en argent', 'Bague dorée', 'Bracelet en cuir', 'Boucles d\'oreilles perles', 'Pendentif céramique', 'Broche fleurie', 'Manchette gravée', 'Sautoir bohème', 'Anneau tressé', 'Headband brodé'],
        'Boucherie & Charcuterie' => ['Saucisson sec', 'Pâté de campagne', 'Jambon fumé', 'Merguez artisanale', 'Boudin noir', 'Rillettes de porc', 'Filet pur de bœuf', 'Terrine de lapin', 'Chipolatas au thym', 'Lard paysan'],
        'Bougies & Senteurs artisanales' => ['Bougie lavande', 'Bougie vanille ambre', 'Bougie cèdre boisé', 'Bougie rose & musc', 'Bougie figue sauvage', 'Diffuseur lin frais', 'Bougie bergamote', 'Bougie caramel salé', 'Bougie thé vert', 'Bougie forêt pins'],
        'Boulangerie artisanale' => ['Pain au levain', 'Baguette tradition', 'Brioche dorée', 'Focaccia romarin', 'Croissant pur beurre', 'Pain de seigle', 'Miche campagnarde', 'Pain aux noix', 'Fougasse olives', 'Tourte froment'],
        'Chaussures artisanales' => ['Derby en cuir', 'Mocassin tressé', 'Botte cavalière', 'Escarpin cuir', 'Sandale artisanale', 'Oxford bicolore', 'Bottine lacée', 'Chausson laine', 'Mule en liège', 'Richelieu patiné'],
        'Chocolats & Confiseries' => ['Pralines belges', 'Truffes au cognac', 'Tablette noir 70%', 'Caramels au beurre', 'Guimauves artisanales', 'Mendiants fruits secs', 'Rochers praliné', 'Barres nougat', 'Bonbons violette', 'Pâtes de fruits'],
        'Créations artisanales' => ['Mobile en bois', 'Cadre macramé', 'Boîte marqueterie', 'Lampe origami', 'Carnet cousu main', 'Sculpture papier', 'Panier tressé', 'Photophore verre', 'Miroir bois flotté', 'Attrape-rêves'],
        'Décoration & Art' => ['Tableau aquarelle', 'Lithographie signée', 'Sculpture argile', 'Affiche typographique', 'Cadre bois brut', 'Toile abstraite', 'Gravure sur bois', 'Sérigraphie limitée', 'Impression botanique', 'Dessin encre de Chine'],
        'Épicerie fine' => ['Huile d\'olive AOP', 'Miel de châtaignier', 'Confiture figue', 'Fleur de sel', 'Vinaigre balsamique', 'Tapenade maison', 'Pesto basilic', 'Truffe noire', 'Caviar d\'aubergine', 'Sauce barbecue fumée'],
        'Fromages & Produits laitiers' => ['Comté 18 mois', 'Camembert au lait cru', 'Chèvre frais', 'Roquefort AOP', 'Beurre de ferme', 'Tomme de Savoie', 'Ricotta artisanale', 'Fromage de Herve', 'Mozzarella bufflonne', 'Yaourt brassé ferme'],
        'Fruits & Légumes de saison' => ['Tomates cerises', 'Courge butternut', 'Pommes Jonagold', 'Poires Conférence', 'Haricots verts fins', 'Betteraves rouges', 'Poireaux fermiers', 'Courgettes jaunes', 'Fraises gariguettes', 'Champignons de Paris'],
        'Linge de maison' => ['Taie brodée', 'Plaid en laine', 'Nappe lin lavé', 'Serviette éponge', 'Rideau voilage', 'Housse de coussin', 'Jeté de lit', 'Torchon tissé', 'Set de table', 'Couverture mohair'],
        'Maroquinerie' => ['Portefeuille cuir', 'Sac cabas', 'Pochette zippée', 'Ceinture tannée', 'Porte-clés gravé', 'Sac à dos cuir', 'Carnet de notes cuir', 'Trousse voyage', 'Bandoulière réglable', 'Étui carte de crédit'],
        'Mobilier & Décoration intérieure' => ['Étagère chêne', 'Table basse palette', 'Lampe pied métal', 'Fauteuil rotin', 'Tabouret bois tourné', 'Console entrée', 'Bibliothèque modulable', 'Banc rustique', 'Meuble TV scandinave', 'Chaise industrielle'],
        'Poterie & Céramique' => ['Bol émaillé', 'Tasse café grès', 'Vase soliflore', 'Plat à gratin', 'Pichet en terre', 'Coupelle raku', 'Théière japonaise', 'Assiette peinte', 'Carafe en grès', 'Pot à crayons'],
        'Savons & Cosmétiques artisanaux' => ['Savon lavande', 'Savon charbon actif', 'Baume lèvres miel', 'Huile corps argan', 'Gommage sucre coco', 'Shampoing solide', 'Crème mains karité', 'Déodorant naturel', 'Masque argile verte', 'Eau florale rose'],
        'Textile & Couture' => ['Écharpe laine', 'Bonnet tricoté', 'Tote bag sérigraphié', 'Trousse en lin', 'Pochette brodée', 'Tablier cuisinier', 'Coussin patchwork', 'Snood polaire', 'Mitaines crochet', 'Kimono coton'],
        'Traiteur & Cuisine' => ['Quiche lorraine', 'Lasagnes maison', 'Gratin dauphinois', 'Tartiflette', 'Vol-au-vent', 'Moussaka artisanale', 'Soupe à l\'oignon', 'Tarte aux légumes', 'Blanquette de veau', 'Cake salé feta'],
        'Ustensiles & Cuisine' => ['Planche à découper', 'Couteau de chef', 'Mortier en granit', 'Poêle en fonte', 'Rouleau à pâtisserie', 'Passoire inox', 'Économe en bois', 'Fouet ballon', 'Spatule silicone', 'Cocotte émaillée'],
        'Vêtements & Mode' => ['Robe lin été', 'Chemise flanelle', 'Pull col roulé', 'Jean slim brut', 'Veste en velours', 'Manteau laine', 'Short bermuda', 'Combinaison ample', 'Blouse bohème', 'Gilet maille'],
        'Vins & Spiritueux' => ['Bordeaux rouge', 'Chardonnay AOP', 'Champagne brut', 'Pinot noir', 'Rosé Provence', 'Gin artisanal', 'Cognac VSOP', 'Whisky tourbé', 'Rhum vieux', 'Liqueur de cassis'],
    ];

    public function definition(): array
    {
        $category = ProductCategory::inRandomOrder()->first();
        $names = $this->namesByCategory[$category->name] ?? ['Produit artisanal'];

        return [
            'product_category_id' => $category->id,
            'name' => $this->faker->randomElement($names),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->numberBetween(100, 2000),
            'is_active' => true,
            'picture_path' => 'images/missing-product.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
