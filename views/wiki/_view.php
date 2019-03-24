<?php

/** @var $model app\models\Wiki the data model */
use yii\helpers\Html;

/** @var $key mixed the key value associated with the data item */
/** @var $index integer the zero-based index of the data item in the items array returned by dataProvider. */
/** @var $widget yii\widgets\ListView the widget instance */

?>
<div class="row">
    <div class="col-md-12 col-lg-9">
        <div class="content wiki-row">
            <h2 class="title"><?= Html::a(Html::encode($model->title), ['wiki/view', 'id' => $model->id, 'name' => $model->slug]) ?></h2>
            <div class="subtitle">
                Created <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?> by <?= $model->creator->rankLink ?><?php
                if ($model->updated_at !== null): ?>,
                    updated <?= Yii::$app->formatter->asRelativeTime($model->updated_at) ?> by <?= $model->updater->rankLink ?><?php
                endif; ?>.
                <div class="comments"><?= Html::a(
                        Yii::$app->i18n->format('{n, number} {n, plural, one{comment} other{comments}}', ['n' => $model->comment_count], Yii::$app->language),
                        ['wiki/view', 'id' => $model->id, 'name' => $model->slug, '#' => 'comments']
                    ) ?></div>
            </div>
            <div class="text"><?= $model->teaser ?></div>
        </div>
    </div>
    <div class="col-md-12 col-lg-3">
        <?= $this->render('_metadata.php', ['model' => $model, 'extended' => false]) ?>
    </div>
</div>


