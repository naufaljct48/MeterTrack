<?php

namespace App\Controllers;

use App\Models\ReferensiModel;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    protected function checkRole($requiredRole)
    {
        if (!session()->get('user')) {
            return [
                'isValid' => false,
                'roleDescription' => 'Guest'
            ];
        }

        $user = session()->get('user');

        $referensiModel = new ReferensiModel();
        $roleValid = $referensiModel->where('id', $user['role'])
            ->where('jenis', 1)
            ->where('status', 1)
            ->first();

        if (!$roleValid) {
            session()->destroy();
            return [
                'isValid' => false,
                'roleDescription' => 'Invalid Role'
            ];
        }

        if ($user['role'] !== $requiredRole) {
            return [
                'isValid' => false,
                'roleDescription' => $roleValid['deskripsi']
            ];
        }

        return [
            'isValid' => true,
            'roleDescription' => $roleValid['deskripsi']
        ];
    }
}
