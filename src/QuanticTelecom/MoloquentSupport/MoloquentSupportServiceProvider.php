<?php namespace QuanticTelecom\MoloquentSupport;

use Illuminate\Support\ServiceProvider;

class MoloquentSupportServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
            'QuanticTelecom\Support\Repositories\TicketRepository',
            'QuanticTelecom\MoloquentSupport\Repositories\MoloquentTicketRepository'
        );

		$this->app->bind(
            'QuanticTelecom\Support\Repositories\CommentRepository',
            'QuanticTelecom\MoloquentSupport\Repositories\MoloquentCommentRepository'
        );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
