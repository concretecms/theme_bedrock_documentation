<?php
namespace Application\Theme\Flintstone;

use Concrete\Core\Backup\ContentImporter;
use Concrete\Core\Feature\Features;
use Concrete\Core\File\Filesystem;
use Concrete\Core\Page\Theme\BedrockThemeTrait;
use Concrete\Core\Page\Theme\Color\Color;
use Concrete\Core\Page\Theme\Color\ColorCollection;
use Concrete\Core\Page\Theme\Documentation\BedrockDocumentationPage;
use Concrete\Core\Page\Theme\Documentation\DocumentationProviderInterface;
use Concrete\Core\Page\Theme\Documentation\ThemeDocumentationPage;
use Concrete\Core\Page\Theme\Theme;
use Concrete\Core\Tree\Node\Type\FileFolder;

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

    /**
     * Note: I'm using a PHP 7 anonymous class in order to define the class returned from DocumentationProvider –
     * but that's only because I don't have an easy way to add this class's namespace to autoload (it doesn't
     * really have one.) If you're building a real theme you should include it in a package and add this
     * within your package's src/ directory.
     *
     * @return DocumentationProviderInterface|null
     */
    public function getDocumentationProvider(): ?DocumentationProviderInterface
    {
        $theme = $this;
        return new class($theme) implements DocumentationProviderInterface {

            protected $theme;

            public function __construct($theme)
            {
                $this->theme = $theme;
            }

            public function clearSupportingElements(): void
            {
                $importer = new ContentImporter();
                $documentation = FileFolder::getNodeByName('Flintstone Documentation');
                if ($documentation) {
                    $documentation->delete();
                }
                $importer->deleteFilesByName(['fred.jpg', 'wilma.jpg', 'dino.gif']);
            }

            public function installSupportingElements(): void
            {
                $importer = new ContentImporter();
                $filesystem = new Filesystem();
                $root = $filesystem->getRootFolder();
                $filesystem->addFolder($root, 'Flintstone Documentation');

                $importer->importFiles(
                    $this->theme->getThemeDirectory() .
                    DIRECTORY_SEPARATOR .
                    DIRNAME_THEME_DOCUMENTATION .
                    DIRECTORY_SEPARATOR .
                    'files'
                );

                $importer->moveFilesByName(['fred.jpg', 'wilma.jpg', 'dino.gif'], 'Flintstone Documentation');

            }

            public function finishInstallation(): void
            {
                // Nothing here.
            }

            public function getPages(): array
            {
                return [
                    new ThemeDocumentationPage($this->theme, 'Overview', 'overview.xml'),
                    new BedrockDocumentationPage('Typography', 'typography.xml'),
                    new BedrockDocumentationPage('Components', 'components.xml'),
                    new ThemeDocumentationPage($this->theme, 'Owl Carousel', 'owl_carousel.xml'),
                ];
            }

        };
    }


}
