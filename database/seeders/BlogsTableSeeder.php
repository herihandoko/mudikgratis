<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blogs')->delete();
        
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Minus tenetur et har',
                'image' => 'assets/uploads/images/media_1648387082.jpg',
                'slug' => 'ea-qui-placeat-culp',
                'category_id' => 1,
                'tags' => 'Veniam cumque quide',
                'description' => '<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>

<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>

<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>',
                'seo_title' => 'Sunt magna ducimus',
                'seo_description' => 'Aut ex quis amet ut',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:18:11',
                'updated_at' => '2022-04-10 16:20:23',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Expedita doloribus u',
                'image' => 'assets/uploads/images/media_1648387209.jpg',
                'slug' => 'aut-asperiores-nobis',
                'category_id' => 2,
                'tags' => 'Asperiores earum rem',
                'description' => '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>

<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>

<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>

<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>',
                'seo_title' => 'Voluptate repudianda',
                'seo_description' => 'Veniam ullam id vol',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:19:02',
                'updated_at' => '2022-04-10 16:20:20',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Quia est dolor quo',
                'image' => 'assets/uploads/images/media_1648387173.jpg',
                'slug' => 'itaque-tenetur-numqu',
                'category_id' => 1,
                'tags' => 'Iure officia expedit',
                'description' => '<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>

<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>

<p>Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>

<p>Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>',
                'seo_title' => 'Voluptatem mollit do',
                'seo_description' => 'Officia sunt non aut',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:19:31',
                'updated_at' => '2022-04-10 16:20:17',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Consectetur sint ear',
                'image' => 'assets/uploads/images/media_1648387104.jpg',
                'slug' => 'blanditiis-voluptate',
                'category_id' => 1,
                'tags' => 'Quis laboriosam qua',
                'description' => '<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>

<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>

<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit.</p>',
                'seo_title' => 'Ut maxime perferendi',
                'seo_description' => 'Aute maiores aute es',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:19:57',
                'updated_at' => '2022-04-10 16:20:14',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Nam nisi nisi incidi',
                'image' => 'assets/uploads/images/media_1648387142.jpg',
                'slug' => 'consequat-possimus',
                'category_id' => 1,
                'tags' => 'Ut deserunt aut est',
                'description' => '<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>

<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit. Veniam civibus omittantur duo ut, te his alterum complectitur. Mea omnis oratio impedit ne.</p>

<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>

<p>His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>',
                'seo_title' => 'Ad molestias veniam',
                'seo_description' => 'Autem laborum sed qu',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:20:33',
                'updated_at' => '2022-04-10 16:20:12',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'In illo qui elit el',
                'image' => 'assets/uploads/images/media_1648387073.jpg',
                'slug' => 'cillum-aspernatur-pa',
                'category_id' => 2,
                'tags' => 'Nostrum officia cons',
                'description' => '<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>

<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit. Veniam civibus omittantur duo ut, te his alterum complectitur. Mea omnis oratio impedit ne.</p>

<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>',
                'seo_title' => 'At labore sint et de',
                'seo_description' => 'In quia labore vero',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:20:49',
                'updated_at' => '2022-04-10 16:20:28',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Reiciendis consectet',
                'image' => 'assets/uploads/images/media_1648387064.jpg',
                'slug' => 'dolor-deserunt-volup',
                'category_id' => 1,
                'tags' => 'Omnis aspernatur nos',
                'description' => '<p>In vim natum soleat nostro, pri in eloquentiam contentiones. Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est, ne pro iudico saperet mnesarchum. Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.</p>

<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et. In vim natum soleat nostro, pri in eloquentiam contentiones. Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est, ne pro iudico saperet mnesarchum. Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.</p>

<p>Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est, ne pro iudico saperet mnesarchum. Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.</p>

<p>Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est, ne pro iudico saperet mnesarchum. Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.</p>',
                'seo_title' => 'Dolor qui adipisci i',
                'seo_description' => 'Sint voluptatum ut',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:21:31',
                'updated_at' => '2022-04-10 16:22:01',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Enim necessitatibus',
                'image' => 'assets/uploads/images/media_1648387055.jpg',
                'slug' => 'voluptas-sit-natus-d',
                'category_id' => 2,
                'tags' => 'Quod voluptas commod',
                'description' => '<p>Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.</p>

<p>Appetere fabellas ius te. Nonumes splendide deseruisse ea vis, alii velit vel eu. Eos ut scaevola platonem rationibus. Vis natum vivendo sententiae in, ea aperiam apeirian pri, in partem eleifend quo. Pro ex nobis utinam, nam et vidit numquam fastidii, ne per munere adolescens.&nbsp;Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.&nbsp;Eos ut scaevola platonem rationibus. Vis natum vivendo sententiae in.</p>

<p>Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.&nbsp;Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum</p>

<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',
                'seo_title' => 'Labore do et qui vol',
                'seo_description' => 'Repellendus Quaerat',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:21:52',
                'updated_at' => '2022-04-10 16:23:07',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Eos doloribus quis c',
                'image' => 'assets/uploads/images/media_1648394590.jpg',
                'slug' => 'assumenda-pariatur',
                'category_id' => 2,
                'tags' => 'Cum qui facere rem n',
                'description' => '<p>Ipsum volumus pertinax mea ut, eu erat tacimates nam. Tibique copiosae verterem mea no, eam ex melius option, soluta timeam et his. Sit simul gubergren reformidans id, amet minimum nominavi eos ea. Et augue dicta vix. Mea ne utamur referrentur.</p>

<p>Per ex vero nonumy. Ius eu doming nominavi mediocrem, aliquid efficiantur no vim, sanctus admodum mnesarchum ad pro. No sea invidunt partiendo. No postea numquam ocurreret duo, unum abhorreant cu nam, fugit fastidii percipitur nam id.</p>

<p>Sit vivendum eleifend adipiscing ea. Modus legere suscipiantur an vel, melius patrioque est cu, eum at audire probatus repudiandae. Ei tempor definitiones eam, sea dico omnium ne. Eam ad ubique tincidunt elaboraret, malis aperiri sit et. Ut quo vero inimicus. Sed at munere fuisset noluisse, eleifend senserit an vix.Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.&nbsp;Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum</p>

<p>Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.&nbsp;Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum</p>',
                'seo_title' => 'Ullam recusandae So',
                'seo_description' => 'Qui mollit qui ut qu',
                'status' => 1,
                'comment_status' => 1,
                'on_featured' => 1,
                'created_at' => '2022-03-27 15:23:27',
                'updated_at' => '2022-04-10 16:23:04',
            ),
        ));
        
        
    }
}