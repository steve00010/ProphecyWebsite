<?php include "header.php"; 
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/PlayerM.php');

$db = new DBConnection();
$PM = new PlayersM($db);
$IPCON = false;
$IPC = $PM->GetUserByIP($_SERVER['REMOTE_ADDR']);
if($IPC) {
	if(sizeOf($IPC) ==1) {
		$IPCON = true;
	}
}


?>

  <div class="container basic-set marketing" >

<h2><span style="color:#2980b9">Thank you for taking time to consider Contributing to the Prophecy Gaming Community.</span></h2>
<hr />
<p>Prophecy Gaming is not a pay to win server and as such 
we do not believe that it is fair to allow players to pay for equipment which provides a tactical advantage in game, or gives anyone better gear. 
We also do not charge subscriptions or any money for any features in game, be it Mods / Missions or any Add-Ons that we are hosting, every mission you play is totally free and all access is given to everything available in said mission.</p>

<p>By contributing to the server you are <span style="color:#e74c3c">NOT paying for rewards in game</span>, you are only helping us keep the server alive.</p>

<p>However, the players who do give back to the community should be <span style="color:#e74c3c">rewarded and thus they are given the rewards as a thank you, not as a paid service.</span></p>

<p><span style="color:#e74c3c">We are incredibly grateful for any Contributions. Little or large.</span> Your contribution cover's Team-speak Costs, Website Upkeep and Server costs , the rewards we provide are a thank you for helping us with the upkeep of the community.</p>

<p>We offer a stacking Reward status which can also help those who may not have as much available money to contribute, so for example if you contribute £5, you will be given a Tier 1 Reward status.</p>
<p>If you wish to Contribute in different amounts this will stack up meaning each month you could contribute £5 and after 5 months, you would have a Tier 5 Reward status.  You will never lose your Reward tier rank.</p>
<p>As we said earlier, <span style="color:#e74c3c">Contributions are your choice</span>, do not feel that £25 is the cap, if you want to support us further you are more than welcome to, these servers the website and team-speak are not cheap and are not free.</p>  

<p>At certain times, a large clan or individual may wish to make a separate contribution for something in game, such as a base or a custom skin.</p>
<p>We may at times wish to accommodate such requests, however as this could have an impact on in-game mechanics, we request that you contact Bruce or Steve BEFORE making such contributions in order to discuss what you need. </p>
<p>Please note also however that this would be separate to gaining Reward tier levels.</p>
<p>All Reward tiers carry across all Community Missions.</p>
<p>Once again, I would like to thank you for visiting this section of the website.</p>

<p>Yours gracefully,</p>
<p><span style="color:#e74c3c">The Prophecy Gaming Administration Team.</span></p>
<hr />
<p><span style="color:#16a085">Rewards Tier 1 (£5-9)</span></p>
<ul>

<li>MSI HummingBird Texture</li>
<li>Monster Offroad Texture </li>
<li>Captain Morgan Offroad Texture</li>
<li>Gokart Yellow Helmet and Suit</li>
</ul>

<p><span style="color:#16a085">Rewards Tier 2 (£10-14)</span></p><ul>

<li><span style="color:#c0392b">Everything from previous tiers</span></li>
<li>Orca Camo Texture</li>
<li>SUV Ferrari Texture</li>
<li>SUV Flames Texture</li>
<li>Hatch Sport WRC Texture</li>
<li>Hatch Sport Redgull Texture</li>
<li>Gokart White Helmet and Suit</li>
</ul>

<p><span style="color:#16a085">Rewards Tier 3 (£15-19)</span></p><ul>

<li><span style="color:#c0392b">Everything from previous tiers</span></li>
<li>SUV Polygon Texture</li>
<li>SUV Tron Texture</li>
<li>SUV Graffiti Texture</li>
<li>SUV Cola Texture</li>
<li>Gokart Helmet and Suit, Orange and Green</li>
<li>Ghillie Suit Available at Rebel Clothing</li>
<li>VR Suit Green</li>
<li>Use of Spray Shop</li>
<li>Renewable Toolkit</li>
<li>Access to Sky diving</li>
</ul>

<p><span style="color:#16a085">Rewards Tier 4 (£20-24)</span></p><ul>

<li><span style="color:#c0392b">Everything from previous tiers</span></li>
<li>Hatchback Sport RockStar Texture</li>
<li>HatchBack Sport MonsterWRC Texture</li>
<li>SUV Taxi Texture</li>
<li>Gokart Helmet and Suit, Red / Black / Blue </li>
<li>VR Suit Red</li>
<li><span style="color:#c0392b">**Coming Soon Hunter Rebel Textures**</span></li>
<li><span style="color:#c0392b">**Coming Soon More Air Vehicle Textures**</span></li>

</ul>

<p><span style="color:#16a085">Rewards Tier 5 (£25+)</span></p><ul>

<li><span style="color:#c0392b">Everything from previous tiers</span></li>
<li>Prophecy Mohawk Reb Camo Texture</li>
<li>Civilian Mohawk Ion Texture</li>
<li>Offroad Monster2 Texture</li>
<li>Offroad Weed Texture</li>
<li>Hatchback Sport Dragon Texture</li>
<li>Gokart Helmet and Suit BlueKing, Redstone, Vrana, Fuel</li>
<li>VR Suit Blue</li>
<li><span style="color:#c0392b">**Coming soon - More ingame features**</span></li>

</ul>
<div class="panel-group" id="accordion1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <h4>Texture Rewards Tier 1 (£5-9)</h4>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                       <table>
						<tbody>
						<tr>
							<td>MSI HummingBird</td>
							<td>Monster Offraod</td>
							<td>Captain Morgan Offroad</td>
						</tr>
						<tr>
							<td><img src="img/skins/tier1/MSIHUM.jpg" width=350px height=300px ></td>
							<td><img src="img/skins/tier1/MON1.jpg"  width=350px height=300px ></td>							
							<td><img src="img/skins/tier1/CaptM.jpg"  width=350px height=300px ></td>
						</tr>
						</tbody>
						</table>
					
                    </div>
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <h4>Texture Rewards Tier 2 (£10-14)</h4>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                       <table>
						<tbody>
						<tr>
							<td>Orca Camo</td>
							<td>SUV Ferrari </td>
							<td>SUV Flames</td>
						</tr>
						<tr>
							<td><img src="img/skins/tier2/OrcaCam.jpg" width=350px height=300px ></td>
							<td><img src="img/skins/tier2/SUVFer.jpg"  width=350px height=300px ></td>							
							<td><img src="img/skins/tier2/SUVFlames.jpg"  width=350px height=300px ></td>
						</tr>
						<tr>
							<td>Hatch Sport WRC</td>
							<td>Hatch Sport Redgull </td>
						</tr>
						<tr>
							<td><img src="img/skins/tier2/HSMWRC.jpg"  width=350px height=300px ></td>							
							<td><img src="img/skins/tier2/HSRedgull.jpg"  width=350px height=300px ></td>
						</tr>								
						</tbody>
						</table>
					
                    </div>
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <h4>Texture Rewards Tier 3 (£15-19)</h4>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                       <table>
						<tbody>
						<tr>
							<td>SUV Polygon</td>
							<td>SUV Tron </td>
							<td>SUV Graffiti</td>
						</tr>
						<tr>
							<td><img src="img/skins/tier3/SUVPoly.jpg" width=350px height=300px ></td>
							<td><img src="img/skins/tier3/SUVTron.jpg"  width=350px height=300px ></td>							
							<td><img src="img/skins/tier3/SUVGraft.jpg"  width=350px height=300px ></td>
						</tr>
						<tr>
							<td>SUV Cola</td>
						</tr>
						<tr>
							<td><img src="img/skins/tier3/SUVCola.jpg"  width=350px height=300px ></td>							

						</tr>								
						</tbody>
						</table>
					
                    </div>
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <h4>Texture Rewards Tier 4 (£20-24)</h4>
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                       <table>
						<tbody>
						<tr>
							<td>Hatchback Sport RockStar Texture</td>
							<td>SUV Taxi Texture</td>
						</tr>
						<tr>
							<td><img src="img/skins/tier4/HSRockstar.jpg" width=350px height=300px ></td>
							<td><img src="img/skins/tier4/SUVTaxi.jpg"  width=350px height=300px ></td>							

						</tr>								
						</tbody>
						</table>
					
                    </div>
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        <h4>Texture Rewards Tier 5 (£25+)</h4>
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                       <table>
						<tbody>
						<tr>
							<td>Mohawk Reb Camo</td>
							<td>Mohawk Ion </td>
							<td>Offroad Monster2</td>
						</tr>
						<tr>
							<td></td>
							<td><img src="img/skins/tier5/MohawkIon.jpg" width=350px height=300px ></td>
							<td><img src="img/skins/tier5/OffMon2.jpg"  width=350px height=300px ></td>							

						</tr>		
						<tr>
							<td>Offroad Weed</td>
							<td>Hatchback Sport Dragon</td>
						</tr>
						<tr>
							<td><img src="img/skins/tier5/OffWeed.jpg" width=350px height=300px ></td>
							<td><img src="img/skins/tier5/HSDrag.jpg"  width=350px height=300px ></td>							

						</tr>							
						</tbody>
						</table>
					
                    </div>
                </div>
            </div>
        </div>
</div>
<hr />

<p>Refund Policy:</p>

<p>Prophecygaming are not obligated to issue a refund. If you feel like you have a case to put forward, contact a Developer or Senior Admin, we are not obligated to offer any Rewards for Contributing, we do it as a thank you.</p>

<p>WE WILL NOT GIVE OUT REFUNDS FOR:</p><ul>
<li>Getting Banned for any reason, if you don't know the rules, its your own fault, we are not some other server, read them.</li>
<li>Loss of Rank, Position, Blacklisted .</li>
<li>Loss of Rewards due to updates, or unforeseen errors.</li>
<li>Loss of Rewards due to changes in policy.</li>
<li>Developer Discretion or changes in what we offer as Rewards.</li>

</ul>
<hr />
<p> In the Player ID form DO NOT put your name, go to your profile and find the profile ID, it should be a number such as 76511197299897976 - put yours in the input box </p>
<div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        <h4>Step 1 - Starting Arma</h4>
                    </a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                        <img src="img/steam_id_1.png" alt="Get Steam ID Picture 1" class="img-thumbnail">
                    </div>
                    <div class="col-md-6">
                        <p>Start your Arma 3 and wait until you see the Main Menu. Now chose the Point "Configure".</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                        <h4>Step 2 - Find your Profile</h4>
                    </a>
                </h4>
            </div>
            <div id="collapse7" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                        <img src="img/steam_id_2.png" alt="Get Steam ID Picture 1" class="img-thumbnail">
                    </div>
                    <div class="col-md-6">
                        <p>The Menu will expand and you find all the Points where you can configre your Arma 3. Now click on the Point "Profile" to simply find you Steam ID.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                        <h4>Step 3 - Find your Steam ID</h4>
                    </a>
                </h4>
            </div>
            <div id="collapse8" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                        <img src="img/steam_id_3.png" alt="Get Steam ID Picture 1" class="img-thumbnail">
                    </div>
                    <div class="col-md-6">
                        <p>You will find all your Profiles you created. On the right Side you will find your unique Steam ID. <br> If you click on "Edit", you can simply Copy and Paste your Steam ID</p>
                    </div>
                </div>
            </div>
        </div>
</div>
<hr />
<p> Make sure you double check this before you contribute! </p>

<p> If you require your tags in teamspeak please contact a senior admin who can check your contribution.</p>
<hr />
<script>
function checkInp() {
    var x = document.forms["_xclick"]["custom"].value;
    if (isNaN(x)) {
        alert("Please put your playerID in, this should consist of numbers only!");
        return false;
    }
};

</script>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Donator form</h3>
  </div>
  <div class="panel-body">
<?php if($IPCON) { ?>
<div class="alert alert-success" role="alert">
      <strong>User Loaded!</strong><br> Your playerid has been automatically filled out for you, if this is incorrect you can change it below!
    </div>
<?php } ?>
<form name="_xclick" onsubmit="return checkInp()" action="https://www.paypal.com/cgi-bin/webscr" 
    method="post">
	Donator Level: 
	<select name="amount">
	<option value="5">Tier 1</option>
	<option value="10">Tier 2</option>
	<option value="15">Tier 3</option>
	<option value="20">Tier 4</option>
	<option value="25">Tier 5</option>
	</select>
	<br><br>
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="b_hamill1977@yahoo.co.uk">
	Player ID: <?php if($IPCON) { ?> <input required type="text" required name="custom" value="<?php echo $IPC[0]; ?>">  <?php } else { ?>
	<input required type="text" required name="custom"> 
	
	<?php } ?>
	
	
	
	<br>
    <input type="hidden" name="currency_code" value="GBP">
    <input type="hidden" name="item_name" value="Donation">
    <input type="hidden" name="return" value="http://prophecygaming.co.uk/donate.php">
    <input type="hidden" name="notify_url" value="http://prophecygaming.co.uk/donatehandler.php">
	<br>
    <input type="image" src="http://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" 
        border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
  </div>
</div>
<br />

  </div>
</div>
<?php include "footer.php"; ?>