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
        </div>
    <a class="right carousel-control" role="button" data-slide="next">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true" id="glyph"  onclick="fullScreenApi.requestFullScreen(document.documentElement)"></span>
    </a>
</div>
<div id="bandeau">
</div>
