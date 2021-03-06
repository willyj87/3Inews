<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/01/17
 * Time: 14:12
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
$this->addStyleSheets('css/full-slider.css');
$this->setPageTitle('3INews');
?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <?php
        foreach ($this->news as $data){
            if ($data['ordre'] == 1){
                $active = 'active';
            }
            else
                $active = '';
            ?>
            <div class="item <?php echo $active?>">
                    <?php
                    echo '<img  class="news-image" src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'" alt="news'.$data['ordre'].'"/>';
                    ?>
                <div class="carousel-caption">
                    <h3>
                        <?php
                        echo $data['texte']?>
                    </h3>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="item">
            <img class="news-image" src="images/chateau.jpg" alt="slide2">
            <div class="carousel-caption">
                <h3>Willy Junior</h3>
                <p>Mon futur Chateau</p>
            </div>
        </div>
        <div class="item">
            <img class="news-image" src="images/alpes.jpg" alt="slide3">
            <div class="carousel-caption">
                <h3>SongueM</h3>
                <p>Veut aller dans les alpes</p>
            </div>
        </div>
        <div class="item">
            <img class="news-image" src="images/bynigth.jpg" alt="slide4">
            <div class="carousel-caption">
                <h3>Thomas Mbede</h3>
                <p>Aime la nuit</p>
            </div>
        </div>
        <div class="item">
            <img class="news-image" src="images/battelfied.jpg" alt="slide5">
            <div class="carousel-caption">
                <h3>WILLY Junior</h3>
                <p>Aime Battlefield</p>
            </div>
        </div>
    </div>
    <a class="right carousel-control" role="button" data-slide="next">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true" id="glyph"  onclick="fullScreenApi.requestFullScreen(document.documentElement)"></span>
    </a>
</div>
