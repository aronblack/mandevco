<?php
/**
 * Template Name: Single Blog
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mandevco
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <section>
                <div class="single-blog">
                    <div class="container">
                        <div class="single-blog-inner">
                            <h1><a href="#">5 Tips for Independant Retailers</a></h1>
                            <span class="date date-center">November 18, 2109</span>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img src="<?php echo get_template_directory_uri();?>/images/blogpost-photo.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p>Whether operating  a small independent business or a franchise of a national chain,  all business owners face the same challenges : getting more customers and spending less to do so. Here are 5 tips that can help :</p>
                            <ul>
                                <li><b>Be a good neighbour :</b> Get to know the businesses around you. Introduce yourself. Ask them how business is going. You would be amazed what you can learn from speaking to your neighbours.</li>
                                <li><b>Share costs: </b>Advertising can be expensive, but if you work with a neighbouring business, you can reduce the cost. A ½ page in a newspaper is not twice as expensive as a ¼ page. You can split the ad visually and split the cost!</li>
                                <li><b>Unify your look:</b> outdoor signage that looks uniﬁed makes stores look more inviting. Similarly, if you are decorating for a  holiday, the décor will have more impact if it is spread across several stores. Work together to come up with a signature look.</li>
                                <li><b>Cross-Promotion:</b>  A karate school located near a coffee shop? Offer the parents a discount on coffee during their child’s classes. A kitchen store and a butcher? Offer a discount on platters with the purchase of a roast. Encourage your customers to visit your neighbours and you will see they will do the same in return.</li>
                                <li><b>Share each-other’s social media posts: </b>nowadays, social media is key for almost all businesses. Engage with the businesses around you through the web by following and sharing their posts. Working together on social media will help both your business and other businesses grow reach.</li>
                            </ul>
                            <p>When small businesses work together, they can reach a wider audience, share customers and encourage each other.</p>
                            <span class="date date-left">November 18, 2109</span>
                        </div>
                    </div>
                </div>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
