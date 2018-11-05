<?php

            $query = explode(" ",$_POST['filmname']);
            $query[] = $_POST['filmname'];

            $resultNY = [];
            $resultTG = [];
            $resultTM = [];
            foreach ($query as $qed_names){
                //New York Times Review
                $apikeyNY = '40512a510722450a9d6d3e02ce93fa87';
                $jsondataNY = file_get_contents("https://api.nytimes.com/svc/movies/v2/reviews/search.json?api-key=$apikeyNY&query=$qed_names");
                $resultNewYorkTimes = json_decode($jsondataNY, true);
                if($resultNewYorkTimes['results']){
                    $resultNY = array_merge($resultNewYorkTimes['results'],$resultNY);
                }

                //The Guardian Review
                $apikeyTG = 'da426177-1e72-408e-8dd8-72e5fa6d3674';
                $jsondataTG = file_get_contents("https://content.guardianapis.com/search?q=$qed_names&api-key=$apikeyTG&format=json&tag=film/film,tone/reviews");
                $resultTheGuardian = json_decode($jsondataTG, true);
                if($resultTheGuardian['response']['results']){
                    $resultTG = array_merge($resultTheGuardian['response']['results'],$resultTG);
                }

                // The Movie Review
                $apikeyTM = '6769553c814ff8e49aada6462acebc41';
                $pre_dataTM = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=$apikeyTM&query=$qed_names&include_adult=false");
                $resultTheMovieDB = json_decode($pre_dataTM, true);

            }


            $final_links = [];
            foreach ($resultNY as $key => $value){
                        $titleOfArticle = $value['display_title'];
                        $linkOfArticle = $value['link']['url'];
                        $final_links['New York Times'][] = "<a href='$linkOfArticle' target='_blank'>$titleOfArticle</a>";
            }

            foreach ($resultTG as $key => $value){
                        $linkOfArticle = $value['webUrl'];
                        $titleOfArticle = $value['webTitle'];
                        $final_links['The Guardian'][] = "<a href='$linkOfArticle' target='_blank'>$titleOfArticle</a>";
            }

            foreach ($resultTheMovieDB['results'] as $value) {
                $movieID = $value['id'];

                //Find Review
                $findDataTM = file_get_contents("https://api.themoviedb.org/3/movie/$movieID/reviews?api_key=$apikeyTM");
                $decoded_TM_data = json_decode($findDataTM, true);

                foreach ($decoded_TM_data['results'] as $item) {
                    $final_links['The Movie DB'][] = '<a href="' . $item['url'] . '" target="_blank" >' . $value['original_title'] . ' </a>';

                }
            }
//echo "<pre>";
//
//print_r($final_links);
//
//die();



?>
