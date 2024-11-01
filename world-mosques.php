<?php 

/*
Plugin Name: World Mosques
Plugin URI: http://www.wordpress.org/plugins/world-mosques
Description: This plugin offers a nice way to spice up your website's sidebar by displaying an image of a randomly selected Mosque along with its brief introduction. 
Version: 1.0
Author: Azkaar Developers
Author URI: http://www.azkaar.com/feedback
License: GPL2
*/

// WIDGET CSS
function wm_scripts() {
	wp_enqueue_style( 'wm-style', plugins_url( '/wm-styles.css', __FILE__ ), false, '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'wm_scripts' );


class WorldMosquesPluginWidget extends WP_Widget {

    // constructor
    function WorldMosquesPluginWidget() {
        parent::__construct( false, 'World Mosques' );
    }
	

	// widget form creation
	function form($instance) {

		// Check values
		if( $instance) {
			 $title = esc_attr($instance['title']);
		} else {
			 $title = '';
		}
		?>

		<div>
		<b><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'WorldMosquesPluginWidget'); ?></label></b>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</div>

		<?php
	}
 
	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	} 

		
	// display widget
	function widget($args, $instance) {
		
		extract( $args );

		//if ( $title ) $widget_data .= $before_title . $title . $after_title;
			


		$list = array(


		"<div class='mosque-wrapper'>
			<h2>Abdul Rahman Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/abdul-rahman-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kabul, Afghanistan</b><br>
			<b>Year Built</b> 2009<br>
			One of the largest mosques of Afghanistan.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Friday Mosque of Herat</h2>
			<div class='mosque-image'><img src='mosque-images/friday-mosque-of-herat.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Herat, Afghanistan</b><br>
			<b>Year Built</b> 1446<br>
			The mosque was the city's first congregational mosque.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Shrine of Hazrat Ali</h2>
			<div class='mosque-image'><img src='mosque-images/shrine-of-hazrat-ali.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Mazari Sharif, Afghanistan</b><br>
			Also known as Blue Mosque or Rawz-e-Sharif.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Shrine of the Cloak</h2>
			<div class='mosque-image'><img src='mosque-images/shrine-of-the-cloak.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kandahar, Afghanistan</b><br>
			<b>Year Built</b> 18th century<br>
			Also known as the Friday Mosque of Kandahar, it houses the 'cloak' worn by the Prophet Muhammad (PBUH).</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Et'hem Bey Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/ethem-bey-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Tirana, Albania</b><br>
			<b>Year Built</b> 1823<br>
			Located in the center of Albania's capital, the mosque was closed during communist rule until 1991.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Great Mosque of Algiers</h2>
			<div class='mosque-image'><img src='mosque-images/great-mosque-of-algiers.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Algiers, Algeria</b><br>
			<b>Year Built</b> 1097<br>
			Located very close to Algiers Harbor. An inscription on the minbar منبر or the pulpit testifies to fact that the mosque was built in 1097.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Ketchaoua Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/ketchaoua-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Algiers, Algeria</b><br>
			<b>Year Built</b> 1612<br>
			It was built during the Ottoman rule in the 17th century, which is a UNESCO World Heritage Site.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>King Fahd Islamic Cultural Center</h2>
			<div class='mosque-image'><img src='mosque-images/king-fahd-islamic-cultural-center.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Buenos Aires, Argentina</b><br>
			<b>Year Built</b> 2006<br>
			Largest mosque in Latin America, named after King Fahd of Saudi Arabia.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Tucson Islamic Center University of Arizona</h2>
			<div class='mosque-image'><img src='mosque-images/tucson-islamic-center-university-of-arizona.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Tucson, Arizona, United States</b><br>
			<b>Year Built</b> 1991<br>
			The Islamic Center of Tucson (ICT) is located in Tucson AZ, situated near the world renowned University of Arizona.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Blue Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/blue-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Yerevan, Armenia</b><br>
			<b>Year Built</b> 1766<br>
			During the soviet era, because of secularist policy, the Mosque stopped its services and became the Museum of Yerevan.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Auburn Gallipoli Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/auburn-gallipoli-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Auburn (Sydney), Australia</b><br>
			<b>Year Built</b> 1979<br>
			The Auburn Gallipoli Mosque is an Ottoman-style mosque in Auburn, a suburb of Sydney, New South Wales, Australia.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Lakemba Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/lakemba-mosque-sydney-australia.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Lakemba (Sydney), Australia</b><br>
			<b>Year Built</b> 1977<br>
			Lebanese Moslems Association. Also known as the Ali Bin Abi Taleb (RA) Mosque.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al Fateh Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/al-fateh-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Juffair, Bahrain</b><br>
			<b>Year Built</b> 1988<br>
			Encompassing 6,500 square meters and having the capacity to accommodate over 7,000 worshippers at a time.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Baitul Mukarram</h2>
			<div class='mosque-image'><img src='mosque-images/baitul-mukarram.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Dhaka, Bangladesh</b><br>
			<b>Year Built</b> 1968<br>
			One of the largest mosques in the world, the mosque has a capacity of 30,000.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sixty Dome Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sixty-dome-mosque-at-bargerhat.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Bagerhat Sadar Upazila, Bangladesh</b><br>
			<b>Year Built</b> 15th century (early)<br>
			It is one of the three UNESCO World Heritage Sites of Bangladesh</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Ali Pasha's Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/ali-pashas-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Sarajevo, Bosnia and Herzegovina</b><br>
			<b>Year Built</b> 1560<br>
			Named for Hadim Ali Pasha, the former Ottoman governor of the Budapest administrative district and the Bosnia Pashaluk.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Emperor's Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/emperors-mosque-bosnia.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Sarajevo, Bosnia and Herzegovina</b><br>
			<b>Year Built</b> 1462<br>
			The first mosque to be built after the Ottoman conquest of Bosnia.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Ferhadija Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/ferhadija-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Banja Luka, Bosnia and Herzegovina</b><br>
			<b>Year Built</b> 1579<br>
			The mosque was damaged during the Bosnian war (1992-1995).</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Gazi Husrev-beg Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/gazi-husrev-beg-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Sarajevo, Bosnia and Herzegovina</b><br>
			<b>Year Built</b> 1531<br>
			It is considered the most important Islamic structure in the country and one of the world's finest examples of Ottoman architecture.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Karadzozbey Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/karadzozbey-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Mostar, Bosnia and Herzegovina</b><br>
			<b>Year Built</b> 1557<br>
			In the Second World War it was severely damaged, and in the Bosnian War it was almost completely destroyed.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Omar Ibn Al-Khattab Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/mesquita-foz-do-iguacu.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Foz do Iguacu, Brazil</b><br>
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sultan Omar Ali Saifuddin Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sultan-omar-ali-saifuddin-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Bandar Seri Begawan, Brunei</b><br>
			<b>Year Built</b> 1959<br>
			A royal Islamic mosque located in Bandar Seri Begawan, the capital of the Sultanate of Brunei.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Canterbury Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/canterbury-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Christchurch, Canterbury, New Zealand</b><br>
			Managed by The Muslim Association of Canterbury (MAC) established in 1977 in the city of Christchurch, New Zealand.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Dongguan Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/dongguan-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Xining, China</b><br>
			<b>Year Built</b> 14th century<br>
			Restored recently, the mosque has colorful white arches along the outside of the wide building.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Great Mosque of Xi'an</h2>
			<div class='mosque-image'><img src='mosque-images/great-mosque-of-xian.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Shaanxi, Xi'an, China</b><br>
			<b>Year Built</b> 742<br>
			One's of the world oldest functioning mosques. The mosque covers 130,000 square meters.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Id Kah Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/id-kah-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kashgar, Xinjiang, China</b><br>
			<b>Year Built</b> 1442<br>
			The Id Kah mosque is a mosque located in Kashgar, Xinjiang, in the western People's Republic of China.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Jamia Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/jamia-mosque-kowloon.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kowloon, Hong Kong, China</b><br>
			<b>Year Built</b> 1890<br>
			The mosque is the oldest mosque in Hong Kong, was expanded in 1915.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Kowloon Masjid and Islamic Centre</h2>
			<div class='mosque-image'><img src='mosque-images/kowloon-masjid-and-islamic-centre.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kowloon, Hong Kong, China</b><br>
			<b>Year Built</b> 1984<br>
			The mosque is capable of accommodating up to approximately 3,500 people.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Muslim Mosque in Lhasa</h2>
			<div class='mosque-image'><img src='mosque-images/muslim-mosque-in-lhasa.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Tibet, Lhasa, China</b><br>
			<b>Year Built</b> 1716<br>
			The existing temple was rebuilt in 1959, covering a total area of 2,600 square meters.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Niujie Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/niujie-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Beijing, China</b><br>
			<b>Year Built</b> 996<br>
			Reconstructed 1661-1722, the mosque reflects a mixture of Islamic and Han Chinese cultural and architectural influences.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mosque of Omar Ibn Al-Khattab</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-of-omar-ibn-al-khattab.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Maicao, Colombia</b><br>
			<b>Year Built</b> 1997<br>
			Currently the second largest mosque in Latin America.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Islamic Center of Washington</h2>
			<div class='mosque-image'><img src='mosque-images/islamic-center-of-washington-dc.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Washington, DC, United States</b><br>
			<b>Year Built</b> 1957<br>
			Located on Embassy Row on Massachusetts Avenue just east of the bridge over Rock Creek.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al Qa'ed Ibrahim Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/al-qaed-ibrahim-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Alexandria, Egypt</b><br>
			<b>Year Built</b> 1948<br>
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al-Azhar Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/al-azhar-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Cairo, Egypt</b><br>
			<b>Year Built</b> 972<br>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>El-Mursi Abul Abbas Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/el-mursi-abul-abbas-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Alexandria, Egypt</b><br>
			<b>Year Built</b> 1219<br>
			The mosque is dedicated to the 13th century Alexandrine Sufi el-Mursi Abul Abbas whose tomb it contains.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mosque of Ibn Tulun</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-of-ibn-tulun.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Cairo, Egypt</b><br>
			<b>Year Built</b> 876-879<br>
			It is arguably the oldest mosque in the city surviving in its original form, and is the largest mosque in Cairo in terms of land area.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mosque of Muhammad Ali</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-of-muhammad-ali.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Cairo Citadel, Egypt</b><br>
			<b>Year Built</b> 1848<br>
			Also known as Alabaster Mosque, situated in the Citadel of Cairo in Egypt and commissioned by Muhammad Ali Pasha between 1830 and 1848.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mosque-Madrassa of Sultan Hassan</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-madrassa-of-sultan-hassan.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Cairo, Egypt</b><br>
			<b>Year Built</b> 1359<br>
			Its construction began 757 AH/1356 CE with work ending three years later without even a single day of idleness.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sheikh Hanafi Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sheikh-hanafi-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Massawa, Eritrea</b><br>
			<b>Year Built</b> 1400s<br>
			Currently Eritrea's oldest mosque, was built on Massawa Island, along with several other works of early Islamic architecture.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Paris Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/paris-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Paris, France</b><br>
			<b>Year Built</b> 1926<br>
			The Mosque was built following the mudéjar style, and its minaret is 33 meters high.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Adina Masjid</h2>
			<div class='mosque-image'><img src='mosque-images/adina-masjid-english-bazar.jpg' /></div>
			<div class='place-desc'> <b>Place</b> English Bazar, India</b><br>
			<b>Year Built</b> 1363<br>
			Built by Sikandar Shah, the second sultan of the Ilyas dynasty. The Adina mosque is one of the largest and the only hypostyle mosque in Bengal.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Charminar</h2>
			<div class='mosque-image'><img src='mosque-images/charminar-hyderabad.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Hyderabad, India</b><br>
			<b>Year Built</b> 1591<br>
			Mosque of the 'four minarets', the landmark has become a global icon of Hyderabad, listed among the most recognized structures of India.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Cheraman Juma Masjid</h2>
			<div class='mosque-image'><img src='mosque-images/cheraman-juma-masjid.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kodungallur, India</b><br>
			<b>Year Built</b> 629<br>
			The Cheraman Masjid is said to be the very first mosque in India, built in 629 AD by Malik lbn Dinar.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Jama Masjid Delhi</h2>
			<div class='mosque-image'><img src='mosque-images/jama-masjid-delhi.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Delhi, India</b><br>
			<b>Year Built</b> 1656<br>
			The principal mosque of Old Delhi in India, commissioned by the Mughal Emperor Shah Jahan, it is the largest and best-known mosque in India.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mecca Masjid</h2>
			<div class='mosque-image'><img src='mosque-images/mecca-masjid-hyderabad.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Hyderabad, India</b><br>
			<b>Year Built</b> 1694<br>
			One of the oldest mosques and the biggest mosque located in Hyderabad, India. Named after Mecca for the bricks made from the city's soil transported to India.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Old Juma Masjid</h2>
			<div class='mosque-image'><img src='mosque-images/old-juma-masjid-kilakarai.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kilakarai, India</b><br>
			<b>Year Built</b> 1023<br>
			Third mosque in India and first mosque in Tamil Nadu, built by Arab settlers.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Ziarat Shareef</h2>
			<div class='mosque-image'><img src='mosque-images/ziarat-shareef-kakrala.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kakrala, India</b><br>
			<b>Year Built</b> 1980<br>
			Built by Hazrat Shah Saqlain Miyan. People from across the country come for 'ziyarat' (visit) of the place, hence the name of this building.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Agung Demak Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/agung-demak-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Demak, Indonesia</b><br>
			<b>Year Built</b> 1466<br>
			 Demak Great Mosque is one of the oldest mosques located in the center town of Demak, Central Java Indonesia.
			 </div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Muhammad Cheng Ho Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/cheng-ho-mosque-surabaya.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Surabaya, Indonesia</b><br>
			<b>Year Built</b> 2002<br>
			The mosque is named after a Chinese admiral who is said to have helped spread Islam in the archipelago in the fifteenth century.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Istiqlal Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/istiqlal-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Jakarta, Indonesia</b><br>
			<b>Year Built</b> 1978<br>
			This national mosque of Indonesia was built to commemorate Indonesian independence (استقلال).
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Menara Kudus Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/menara-kudus-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kudus, Indonesia</b><br>
			<b>Year Built</b> 1549<br>
			Al-Manar Mosque is the oldest mosque in Central Java, preserving pre-Islamic architectural forms.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Raya Baiturrahman Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/raya-baiturrahman-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Banda Aceh, Indonesia</b><br>
			<b>Year Built</b> 1881<br>
			It is of great cultural and symbolic significance to the Acehnese people, especially since it survived the devastating 2004 tsunami intact.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Yogyakarta Grand Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/yogyakarta-grand-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Special Region of Yogyakarta, Indonesia</b><br>
			<b>Year Built</b> 1773<br>
			 The royal mosque of Yogyakarta Sultanate.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Hassan Bek Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/hassan-bek-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Tel Aviv, Israel</b><br>
			<b>Year Built</b> 1916<br>
			The unique Ottoman style architecture it displays, is known to contrast sharply with the contemporary modern high-rises that are situated near it.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Jezzar Pasha Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/jezzar-pasha-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Acre, Israel</b><br>
			<b>Year Built</b> 1781<br>
			Also known as the white mosque, located inside the walls of the old city of Acre, named after the Bosniak Ottoman governor Ahmed al-Jezzar Pasha.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sidna Ali Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sidna-ali-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Al-Haram, Israel</b><br>
			<b>Year Built</b> 13th century<br>
			The mosque is located in the depopulated village of Al-Haram on the beach in the northern part of Herzliya in Israel.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Grand Mosque of Rome</h2>
			<div class='mosque-image'><img src='mosque-images/grand-mosque-of-rome.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Rome, Italy</b><br>
			<b>Year Built</b> 1994<br>
			One of the largest mosques in Italy and Europe. It has an area of 320,000 square feet, and can accommodate 12,000 people.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Kobe Muslim Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/kobe-muslim-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kobe, Japan</b><br>
			<b>Year Built</b> 1935<br>
			Founded in 1935 and is Japan's first mosque. The mosque was built in traditional Turkish style by the Czech architect Jan Josef Švagr (1885–1969).
			</div>
		</div>
		",
		"<div class='mosque-wrapper'>
			<h2>King Abdullah I Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/king-abdullah-i-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Amman, Jordan</b><br>
			<b>Year Built</b> 1982-89<br>
			Named for Abdullah I of Jordan, it is capped by a magnificent blue mosaic dome beneath which 3,000 Muslims may offer prayer.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Grand Mosque Of Kuwait</h2>
			<div class='mosque-image'><img src='mosque-images/grand-mosque-of-kuwait.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kuwait City, Kuwait</b><br>
			<b>Year Built</b> 1979-1986<br>
			The Grand Mosque is the largest and the official mosque in the country of Kuwait. Its area spans 45,000 square metres.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mohammad Al-Amin Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/mohammad-al-amin-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Beirut, Lebanon</b><br>
			<b>Year Built</b> 2007<br>
			 It was built by the former Lebanese Prime Minister Rafik Hariri, who was buried beside it.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Federal Territory Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/federal-territory-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kuala Lumpur, Malaysia</b><br>
			<b>Year Built</b> 2000<br>
			 It is the 44th mosque built by the Government within the city limits. The mosque can accommodate 17,000 worshippers at any one time.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Jamek Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/jamek-mosque-malaysia.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kuala Lumpur, Malaysia</b><br>
			<b>Year Built</b> 1909<br>
			The mosque has a Moorish architecture, located at the confluence of the Klang and Gombak River, designed by Arthur Benison Hubback.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>National Mosque of Malaysia</h2>
			<div class='mosque-image'><img src='mosque-images/national-mosque-of-malaysia.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kuala Lumpur, Malaysia</b><br>
			<b>Year Built</b> 1965<br>
			It has a capacity of 15,000 people and is situated among 13 acres of beautiful gardens.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Putra Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/putra-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Putrajaya, Malaysia</b><br>
			<b>Year Built</b> 1999<br>
			 It is located next to Perdana Putra which houses the Malaysian Prime Minister's office and man-made Putrajaya Lake.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sultan Salahuddin Abdul Aziz Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sultan-salahuddin-abdul-aziz-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Shah Alam, Malaysia</b><br>
			<b>Year Built</b> 1988<br>
			The architectural design is a combination of Malay and Modernist style. The mosque has the capacity to accommodate 24,000 worshippers at a time.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Zahir Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/zahir-mosque-malaysia.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Alor Setar, Malaysia</b><br>
			<b>Year Built</b> 1912<br>
			It is one of the grandest and oldest mosques in Malaysia. The state's Quran reading competition is held annually within the premises of the mosque.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Djinguereber Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/djinguereber-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Timbuktu, Mali</b><br>
			<b>Year Built</b> 1327<br>
			It has three inner courts, two minarets and twenty-five rows of pillars aligned in an east-west direction and prayer space for 2,000 people.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Great Mosque of Djenne</h2>
			<div class='mosque-image'><img src='mosque-images/great-mosque-of-djenne.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Djenne, Mali</b><br>
			<b>Year Built</b> 13th century<br>
			It is a large mud brick or adobe building of Sudano-Sahelian architectural style, current structure dates from 1907.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Chinguetti Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/chinguetti-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Chinguetti, Mauritania</b><br>
			In the 1970s this old mosque was restored through a UNESCO effort, but it, along with the city itself, continues to be threatened by intense desertification.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Jummah Masjid</h2>
			<div class='mosque-image'><img src='mosque-images/jummah-mosque-mauritius.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Port Louis, Mauritius</b><br>
			<b>Year Built</b> 1853<br>
			One of the beautiful mosques, and the first one to be built in the Indian Ocean, substantial additions built through the 1890s</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Hassan II Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/hassan-ii-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Casablanca, Morocco</b><br>
			<b>Year Built</b> 1993<br>
			A maximum of 105,000 worshippers can gather together for prayer. Its minaret is the world's tallest at 210 metres with 60 stories. 
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Koutoubia Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/koutoubia-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Marrakech, Morocco</b><br>
			<b>Year Built</b> 1184-1199<br>
			Ornamented with curved windows, a band of ceramic inlay, pointed merlons, and decorative arches, with a minaret 77 metres in height.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Abuja National Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/abuja-national-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Abuja, Nigeria</b><br>
			<b>Year Built</b> 1984<br>
			The national mosque of Nigeria, a country with a substantial Muslim population.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Great Mosque of Kano</h2>
			<div class='mosque-image'><img src='mosque-images/great-mosque-of-kano.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kano, Nigeria</b><br>
			<b>Year Built</b> 15th century<br>
			The mosque was rebuilt in 19th century, destroyed in the 1950s and built once again with British sponsorship.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sultan Qaboos Grand Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sultan-qaboos-grand-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Muscat, Oman</b><br>
			<b>Year Built</b> 2001<br>
			The national mosque of Oman, built from 300,000 tonnes of Indian sandstone, named after Qaboos bin Said al-Said.</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Badshahi Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/badshahi-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Lahore, Pakistan</b><br>
			<b>Year Built</b> 1673<br>
			Commissioned by the sixth Mughal Emperor Aurangzeb, capable of accommodating 150,000 worshippers in its prayer hall, courtyards and porticoes.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Faisal Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/faisal-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Islamabad, Pakistan</b><br>
			<b>Year Built</b> 1986<br>
			Designed by a Turkish architect Vedat Dalokay, funded by the Saudi Government and located in Islamabad, the capital city of Pakistan.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Masjid-e-Tooba</h2>
			<div class='mosque-image'><img src='mosque-images/masjid-tooba-karachi-pakistan.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Karachi, Pakistan</b><br>
			<b>Year Built</b> 1969<br>
			One of the major tourist attractions in Karachi, built with pure white marble. Its dome is 72 meters in diameter no central pillars.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Shah Jahan Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/shah-jahan-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Thatta, Pakistan</b><br>
			<b>Year Built</b> 1647<br>
			It was a gift from Mughal emperor Shah Jahan to people of Sindh for their hospitality. The mosque has overall 93 domes.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al-Aqsa Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/al-aqsa-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Jerusalem, Palestinian Territories</b><br>
			<b>Year Built</b> 705 CE<br>
			Also known as Bayt al-Muqaddas, is the third holiest site in Islam and is located in the Old City of Jerusalem.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Great Mosque of Gaza</h2>
			<div class='mosque-image'><img src='mosque-images/great-mosque-of-gaza.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Gaza, Palestinian territories</b><br>
			<b>Year Built</b> 1344<br>
			The Great Mosque is situated in the Daraj Quarter of the Old City in Downtown Gaza at the eastern end of Omar Mukhtar Street.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mosque of Omar</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-of-omar.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Bethlehem, Palestinian territories</b><br>
			<b>Year Built</b> 1860<br>
			Named after Umar ibn al-Khattab (581–644), the 2nd Rashidun Muslim Caliph who issued a law that would guarantee respect for the shrine and safety for Christians and clergy.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>El Centro Cultural Islamico de Colon</h2>
			<div class='mosque-image'><img src='mosque-images/el-centro-cultural-islamico-de-colon.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Colon, Panama</b><br>
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Masjid Al-Dahab</h2>
			<div class='mosque-image'><img src='mosque-images/masjid-al-dahab-manila.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Manila, Philippines</b><br>
			<b>Year Built</b> 1976<br>
			It is considered the largest mosque in Metro Manila. The Golden Mosque is so-named because of its dome is painted in shining gold.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Lisbon Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/lisbon-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Lisbon, Portugal</b><br>
			<b>Year Built</b> 1988<br>
			The external features include a minaret and a dome. The mosque contains reception halls, a prayer hall and an auditorium.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Moscow Cathedral Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/moscow-cathedral-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Moscow, Russia</b><br>
			<b>Year Built</b> 1904<br>
			The building was demolished in 2011 to reconstruct a new mosque at the site of the former Moscow Cathedral Mosque.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Qolsharif Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/qolsharif-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kazan, Russia</b><br>
			<b>Year Built</b> 2005<br>
			At the time of its construction it was reputed to be the largest mosque in Russia and Europe outside of Istanbul.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al-Masjid Al-Nabawi</h2>
			<div class='mosque-image'><img src='mosque-images/al-masjid-al-nabawi.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Medina, Saudi Arabia</b><br>
			<b>Year Built</b> 622, 1817<br>
			A mosque built by the Islamic Prophet Muhammad (PBUH) situated in the city of Medina. It is the second holiest site in Islam.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>King Saud Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/king-saud-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Jeddah, Saudi Arabia</b><br>
			<b>Year Built</b> 1987<br>
			Named after King Saud (1953-1964), the largest mosque in the city of Jeddah and is located in Jeddah's Al-Sharafeyyah District.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Masjid Al-Haram</h2>
			<div class='mosque-image'><img src='mosque-images/masjid-al-haram.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Mecca, Saudi Arabia</b><br>
			<b>Year Built</b> 638, 1571<br>
			It is the largest mosque in the world and surrounds one of Islam's holiest places, the Kaaba.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Great Mosque at Touba</h2>
			<div class='mosque-image'><img src='mosque-images/great-mosque-at-touba.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Touba, Senegal</b><br>
			<b>Year Built</b> 1963<br>
			The mosque attracts between one and two million people from all over Senegal and beyond each year. Next to it is the tomb Shaikh Aamadu Bàmba Mbàkke.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Bajrakli Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/bajrakli-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Belgrade, Serbia</b><br>
			<b>Year Built</b> Around 1575<br>
			A mosque in Belgrade, the capital of Serbia. It was damaged after being set on fire in 2004, but was later repaired.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Masjid Sultan</h2>
			<div class='mosque-image'><img src='mosque-images/masjid-sultan-singapore.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Singapore, Singapore</b><br>
			<b>Year Built</b> 1826<br>
			Named after Sultan Hussain Shah. The prayer hall and domes highlight the mosque's star features.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Fakr Ad-Din Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/fakr-ad-din-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Mogadishu, Somalia</b><br>
			<b>Year Built</b> 1269<br>
			The Oldest mosque in Mogadishu, built by the Mogadishu Sultanate's first Sultan, Fakr ad-Din.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mosque of Islamic Solidarity</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-of-islamic-solidarity.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Mogadishu, Somalia</b><br>
			<b>Year Built</b> 1987<br>
			Constructed with the financial support from the Saudi Fahd bin Abdul Aziz Al-Saud Foundation. It is the main mosque in Somalia's capital city.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Seoul Central Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/seoul-central-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Seoul, South Korea</b><br>
			<b>Year Built</b> 1976<br>
			The Seoul Central Mosque opened in 1976 in Itaewon, Seoul. It is located in Hannam-dong, Yongsan-gu.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Jami Ul-Alfar Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/jami-ul-alfar-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Colombo, Sri Lanka</b><br>
			<b>Year Built</b> 1909<br>
			It is a historic mosque in Colombo built with Moorish architectural style, and a popular tourist site in the city.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Hajja Soad Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/hajja-soad-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Khartoum, Sudan</b><br>
			Hajja Soad's mosque took a pyramid shape which is a creative style in Islamic architecture.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Umayyad Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/umayyad-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Damascus, Syria</b><br>
			<b>Year Built</b> 715<br>
			The mosque is reported to be the place where Hazrat Isa bin Maryam (Jesus son of Mary) will return at the End of Days.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Taipei Grand Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/taipei-grand-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Taipei, Taiwan</b><br>
			<b>Year Built</b> 1960<br>
			The Taipei Grand Mosque is the largest and most famous mosque in Taiwan with a total area of 2,747 square meters.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>300 Years Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/300-years-mosque-thailand.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Narathiwat, Thailand</b><br>
			<b>Year Built</b> 1624<br>
			The style is traditional Thai with Chinese and Malay influences, built entirely of wood, originally roofed with palm leaves, which later were replaced with fired clay tiles.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Baan Haw Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/baan-haw-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Chiang Mai, Thailand</b><br>
			<b>Year Built</b> 19th century<br>
			The current building was built with more Arabic architectural style.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al-Zaytuna Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/al-zaytuna-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Tunis, Tunisia</b><br>
			<b>Year Built</b> 703<br>
			The mosque is known to host one of the first and greatest universities in the history of Islam. Many Muslim scholars were graduated from the Al-Zaytuna for over a thousand years.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Great Mosque of Kairouan</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-of-uqba.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Kairouan, Tunisia</b><br>
			<b>Year Built</b> 670<br>
			Also known as the Mosque of Uqba, built by the Arab general Uqba ibn Nafi at the founding of the city of Kairouan.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Eyup Sultan Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/eyup-sultan-mosque-turkey.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Istanbul, Turkey</b><br>
			<b>Year Built</b> 1458<br>
			The mosque rises next to the place where Abu Ayyub al-Ansari (RA), the standard-bearer of the prophet Muhammad (PBUH), is buried.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Fatih Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/fatih-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Istanbul, Turkey</b><br>
			<b>Year Built</b> 1463-1771<br>
			 Named after the Ottoman sultan Fatih Sultan Mehmed. The mosque is one of the largest examples of Turkish-Islamic architecture.
			 </div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Kocatepe Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/kocatepe-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Ankara, Turkey</b><br>
			<b>Year Built</b> 1987<br>
			Its size and prominent situation have made it a landmark that can be seen from almost anywhere in central Ankara.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Ortaköy Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/ortakoy-mosque-turkey.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Istanbul, Turkey</b><br>
			<b>Year Built</b> 18th century<br>
			Designed in neo-baroque style, situated at the waterside of the Ortaköy pier square, reconstruction (1854-1856) was commissioned by the Ottoman sultan Abdülmecid.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sabanci Merkez Camii</h2>
			<div class='mosque-image'><img src='mosque-images/sabanci-merkez-camii.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Adana, Turkey</b><br>
			<b>Year Built</b> 1998<br>
			One of the largest mosques in Turkey, the exterior is similar to the Sultan Ahmed Mosque in Istanbul while the interior is similar to the Selimiye Mosque in Edirne.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Selimiye Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/selimiye-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Edirne, Turkey</b><br>
			<b>Year Built</b> 1568-1574<br>
			Commissioned by Sultan Selim II, built by architect Mimar Sinan who considered it to be his masterpiece and is one of the highest achievements of Islamic architecture.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Suleymaniye Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/suleymaniye-mosque-istanbul.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Istanbul, Turkey</b><br>
			<b>Year Built</b> 1550-1557<br>
			an Ottoman imperial mosque located on the Third Hill of Istanbul, Turkey. It is the largest mosque in the city, and one of the best-known sights of Istanbul.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sultan Ahmed Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sultan-ahmed-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Istanbul, Turkey</b><br>
			<b>Year Built</b> 1609-1616<br>
			Popularly known as the Blue Mosque for the blue tiles adorning the walls of its interior. It was built during the rule of Ahmed I.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Ertugrul Gazi Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/ertugrul-gazi-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Ashgabat, Turkmenistan</b><br>
			<b>Year Built</b> 1998<br>
			 It honors Ertuğrul, the father of Osman I, the founder of the Ottoman Empire, a prominent landmark with a lavish interior decoration.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Grand Mosque of Dubai</h2>
			<div class='mosque-image'><img src='mosque-images/grand-mosque-of-dubai.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Dubai, United Arab Emirates</b><br>
			<b>Year Built</b> 1998<br>
			Originally built in 1900, demolished and built again in 1960, underwent a further rebuilding in 1998. The mosque is the hub of Dubai’s religious and cultural life.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Sheikh Zayed Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/sheikh-zayed-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Abu Dhabi, United Arab Emirates</b><br>
			<b>Year Built</b> 2000<br>
			 The project was initiated by the late President Sheikh Zayed bin Sultan Al-Nahyan. With a capacity of over 40,000, the mosque has 82 domes of seven different sizes.
			 </div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Mosque of Sheikh Ibrahim Al-Ibrahim</h2>
			<div class='mosque-image'><img src='mosque-images/mosque-of-sheikh-ibrahim-al-ibrahim.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Caracas, Venezuela</b><br>
			<b>Year Built</b> 1993<br>
			Also known as Caracas Mosque is the second largest mosque at this moment in Latin America after the King Fahd Islamic Cultural Center in Buenos Aires.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al Muhdhar Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/al-muhdhar-mosque.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Tarim, Yemen</b><br>
			<b>Year Built</b> 1914<br>
			The minaret of the Al Muhdhar Mosque at Tarim is 53 metres (175 ft) high, and recognized to be one of the tallest earth structures in the world.
			</div>
		</div>",
		"<div class='mosque-wrapper'>
			<h2>Al Saleh Mosque</h2>
			<div class='mosque-image'><img src='mosque-images/al-saleh-mosque-sanaa.jpg' /></div>
			<div class='place-desc'> <b>Place</b> Sanaa, Yemen</b><br>
			<b>Year Built</b> 2008<br>
			The largest and most modern mosque in Yemen with a capacity of over 30,000.
			</div>
		</div>"

		);
			
		
		// these are the widget options
		//$title = apply_filters('widget_title', $instance['title']);
		
		$widget_data .= '';
		
		$widget_data .= $list[rand(0, sizeof($list)-1)];

		$image_folder = plugins_url( '/mosque-images', __FILE__ );

		$widget_data = str_replace("mosque-images", $image_folder, $widget_data);
		
		$widget_data = '<div id="world-mosques-widget">'.$widget_data.'</div>';
		
		
		echo $before_widget . $widget_data . $after_widget;
				
	} // widget function
		
	
	
}


// register widget
function world_mosques_register_widget() {
	register_widget( 'WorldMosquesPluginWidget' );
}
add_action( 'widgets_init', 'world_mosques_register_widget' );


?>
