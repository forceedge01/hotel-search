<?php

$width="100%";
$height="45%";
$adults=$_GET['adults'] ?? 2;
$children=$_GET['children'] ?? 3;
$kid1=$_GET['kid1'] ?? 7;
$kid2=$_GET['kid2'] ?? 5;
$kid3=$_GET['kid3'] ?? 4;
$checkin=isset($_GET['checkin']) ? date_create($_GET['checkin']) : date_create(date());
$nights=$_GET['nights'] ?? 2;
$checkout=(new DateTime($checkin->format('Y-m-d')))->modify("+{$nights} days");

$location=$_GET['location'] ?? 'England';
$rooms=1;
$roomsIfnot=2;

$sortingTable = [
    'hotels.co.uk' => 'PRICE_LOW_TO_HIGH',
    'booking.co.uk' => 'price',
    'premierinn' => 2,
];

?>

<html>
    <body>
        <form>
            Checkin Date <input type="date" name="checkin" value="<?=$checkin->format('Y-m-d')?>" />
            Nights <input type="int" name="nights" value="<?=$nights?>" />
            Location <input type="text" name="location" value="<?=$location?>" />
            <hr />
            Adults <input type="int" name="adults" value=<?=$adults?> />
            Children <input type="int" name="children" value=<?=$children?> />
            Kid1 <input type="int" name="kid1" value=<?=$kid1?> />
            Kid2 <input type="int" name="kid2" value=<?=$kid2?> />
            Kid3 <input type="int" name="kid3" value=<?=$kid3?> />
            Checkout date: <?=$checkout->format('Y-m-d')?>
            <button type="submit" name="search">Search</button>
        </form>
        
        <div style="height: 150px; width: 30%; display: block; float: left;">
        <a
            style="padding: 10px; border: 1px solid black"
            href="https://www.kayak.co.uk/hotels/<?=$location?>/<?=$checkin->format('Y-m-d')?>/<?=$checkout->format('Y-m-d')?>/<?=$adults?>adults/<?=$children?>children-<?=$kid1?>-<?=$kid2?>-<?=$kid3?>/<?=$rooms?>rooms?sort=price_a"
            target="_blank">View on Kayak</a>
        <a
            style="padding: 10px; border: 1px solid black"
            href="https://www.travelodge.co.uk/search/results?location=<?=$location?>&action=search&source=l&checkIn=<?=$checkin->format('d/m/y')?>&checkOut=<?=$checkout->format('d/m/y')?>&rooms[0][adults]=1&rooms[0][children]=2&rooms[1][adults]=1&rooms[1][children]=1&sb=1"
            target="_blank">View on Travelodge</a>
        <a
            style="padding: 10px; border: 1px solid black"
            href="https://www.airbnb.co.uk/s/<?=$location?>/homes?tab_id=home_tab&refinement_paths%5B%5D=%2Fhomes&flexible_trip_lengths%5B%5D=one_week&date_picker_type=calendar&checkin=<?=$checkin->format('Y-m-d')?>&checkout=<?=$checkout->format('Y-m-d')?>&adults=<?=$adults?>&children=<?=$children?>&source=structured_search_input_header&search_type=filter_change"
            target="_blank">AirBnb</a>
        <a
            style="padding: 10px; border: 1px solid black"
            href="https://www.google.co.uk/maps/place/<?=$location?>"
            target="_blank">Maps</a>
        <a
            style="padding: 10px; border: 1px solid black"
            href="https://www.tripadvisor.co.uk/Search?q=<?=$location?>&searchNearby=true&blockRedirect=true"
            target="_blank">Things todo</a>
        </div>
        <div style="height: 150px; width: 69%; display: block; float: left;">
            <iframe src="https://www.metoffice.gov.uk/search?query=<?=$location?>#?date=<?=$checkin->format('Y-m-d')?>" width="100%" height="100%"></iframe>
        </div>

        <hr />

        <iframe
            src="https://uk.hotels.com/Hotel-Search?adults=<?=$adults?>&children=1_<?=$kid1?>%2C1_<?=$kid2?>%2C1_<?=$kid3?>&d1=<?=($checkin->format('Y-m-d'))?>&d2=<?=($checkout->format('Y-m-d'))?>&destination=<?=$location?>&endDate=<?=($checkout->format('Y-m-d'))?>&rooms=1&semdtl=&sort=<?=$sortingTable['hotels.co.uk']?>&startDate=<?=$checkin->format('Y-m-d')?>&theme=&useRewards=false&userIntent="
            height="<?=$height?>"
            width="<?=$width?>"
        ></iframe>
        <iframe
            src="https://www.booking.com/searchresults.en-gb.html?ss=<?=$location?>&is_ski_area=0&ssne=<?=$location?>&ssne_untouched=<?=$location?>&dest_type=city&checkin_year=<?=($checkin->format('Y'))?>&checkin_month=<?=($checkin->format('n'))?>&checkin_monthday=<?=($checkin->format('j'))?>&checkout_year=<?=($checkout->format('Y'))?>&checkout_month=<?=($checkout->format('n'))?>&checkout_monthday=<?=($checkout->format('j'))?>&group_adults=<?=$adults?>&group_children=<?=$children?>&age=7&age=5&age=4&no_rooms=1&b_h4u_keep_filters=&from_sf=1&order=<?=$sortingTable['booking.co.uk']?>"
            height="<?=$height?>"
            width="<?=$width?>"
        ></iframe>
        <iframe
            src="https://www.premierinn.com/gb/en/search.html?searchModel.searchTerm=<?=$location?>&ARRdd=<?=($checkin->format('j'))?>&ARRmm=<?=($checkin->format('n'))?>&ARRyyyy=<?=($checkout->format('Y'))?>&NIGHTS=<?=$nights?>&ROOMS=<?=$roomsIfnot?>&ADULT1=1&CHILD1=2&COT1=0&INTTYP1=FAM&ADULT2=1&CHILD2=1&COT2=0&INTTYP2=FAM&BOOKINGCHANNEL=WEB&SORT=<?=$sortingTable['premierinn']?>&VIEW=2"
            height="<?=$height?>"
            width="<?=$width?>"
        ></iframe>
    </body>
</html>
