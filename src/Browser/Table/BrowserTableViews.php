<?php namespace Anomaly\FilesModule\Browser\Table;

use Anomaly\FilesModule\Drive\Contract\DriveInterface;
use Anomaly\FilesModule\Drive\Contract\DriveRepositoryInterface;

/**
 * Class BrowserTableViews
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FilesModule\Browser\Table
 */
class BrowserTableViews
{

    /**
     * Handle the table views.
     *
     * @param BrowserTableBuilder $builder
     */
    public function handle(BrowserTableBuilder $builder, DriveRepositoryInterface $drives)
    {
        $views = [];

        $active = $builder->getOption('drive');

        /* @var DriveInterface $drive */
        foreach ($drives->all() as $drive) {
            $views[$drive->getSlug()] = [
                'text'   => $drive->getName(),
                'href'   => 'admin/files/browser/' . $drive->getSlug(),
                'active' => $drive->getSlug() === $active->getSlug()
            ];
        }

        $builder->setViews($views);
    }
}
