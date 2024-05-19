<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ParserController extends Controller
{
    public function actionIndex()
    {
        $html = file_get_contents('https://www.orinfo.ru/');
        $crawler = new Crawler($html);
        $crawler = $crawler->filter('a');
        dd($crawler->links());
//        $html = '<html>
//<body>
//    <span id="article-100" class="article">Article 1</span>
//    <span id="article-101" class="article">Article 2</span>
//    <span id="article-102" class="article">Article 3</span>
//</body>
//</html>';

//        $crawler = new Crawler();
//        $crawler->addHtmlContent($html);
//        $a = $crawler->filterXPath('//span[contains(@id, "article-")]')->evaluate('substring-after(@id, "-")');
//        $image = $crawler->image();
//        dd($image);

//        foreach ($crawler as $domElement) {
//            var_dump($domElement->nodeName);
//        }


            return ExitCode::OK;
    }
}
