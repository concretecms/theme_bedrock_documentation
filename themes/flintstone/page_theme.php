<?php
namespace Application\Theme\Flintstone;

use Concrete\Core\Feature\Features;
use Concrete\Core\Page\Theme\BedrockThemeTrait;
use Concrete\Core\Page\Theme\Color\Color;
use Concrete\Core\Page\Theme\Color\ColorCollection;
use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme
{

    use BedrockThemeTrait {
        getColorCollection as getBedrockColorCollection;
    }

    public function getThemeName()
    {
        return t('Flintstone');
    }

    public function getThemeDescription()
    {
        return t('A colorful Concrete CMS theme.');
    }

    public function getColorCollection(): ?ColorCollection
    {
        $collection = $this->getBedrockColorCollection();
        $collection->add(new Color('fun', t('Fun!')));
        return $collection;
    }

    public function getThemeSupportedFeatures()
    {
        return [
            Features::BASICS,
            Features::TYPOGRAPHY,
            Features::IMAGERY,
        ];
    }


}
