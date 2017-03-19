<?php
/**
 * Created by PhpStorm.
 * User: Evgeniy
 * Date: 19.03.2017
 * Time: 15:15
 */

namespace App\Http\Sections;


use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

class Portfolio extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title = 'Portfolio';
    /**
     * @var string
     */
    protected $alias;
    /**
     * @return DisplayInterface
     */

    public function onDisplay()
    {
        $display = AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary');
        $display->setColumns(

            AdminColumn::text('id','ID'),
            AdminColumn::text('name','Название'),
            AdminColumn::text('desc','Описание'),
            AdminColumn::image('image', 'Картинка')->setWidth('100px'),
            AdminColumnEditable::checkbox('available','Available')->setWidth('50px')

        );
        return $display;
    }
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody(
            [
                AdminFormElement::text('name','Название')->required(),
                AdminFormElement::text('desc','Описание')->required(),
                AdminFormElement::checkbox('available','Available'),
                AdminFormElement::image('image','image')
                    ->setUploadPath(function(\Illuminate\Http\UploadedFile $file) {
                        return 'upload/sliders'; // public
                    })
                    ->setUploadSettings([
                            'resize' => [480, 700, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    )
            ]
        );
    }
    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }
    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}