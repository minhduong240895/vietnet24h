<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 10:33 AM
 */

namespace App\Repositories;
use App\Models\Setting;
use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;
use App\Repositories\BaseRepository;
use \DateTimeZone;

class SettingsRepository extends BaseRepository
{
    /**
     * @var NewsRepository
     */
    protected $eventRepository;

    /**
     * SettingsRepository constructor.
     *
     * @param App $app
     * @param Collection $collection
     */
    public function __construct(App $app, Collection $collection)
    {
        parent::__construct($app, $collection);
    }

    public function model()
    {
        return Setting::class;
    }

    /**
     * Get settings with deleted since $since param if passed
     *
     * @param string|bool $since
     *
     * @return mixed
     */
    public function getSettingsWithDeleted($since = false)
    {
        $settings = $this->getAll()->withTrashed();

        if ($since) {
            $settings->where('updated_at', '>=', $since->toDateTimeString());
        }

        return $settings->get();
    }

    /**
     * Get Setting by key since $since param if passed
     *
     * @param $setting
     * @param $since
     *
     * @return mixed
     */
    public function getByKeyWithDeleted($setting, $since = false)
    {
        $settings = $this->getAll()->withTrashed()->where('key', $setting);

        if ($since) {
            $settings->where('updated_at', '>=', $since->toDateTimeString());
        }

        return $settings->first();
    }

    /**
     * Get setting value by key
     *
     * @param string $setting
     * @return mixed
     */
    public function getByKey($setting)
    {
        $settings = $this->getAll()->where('key', $setting);

        return $settings->first();
    }


    /**
     * Save settings
     *
     * @param array $settings
     * @param int $conferenceId
     *
     * @return mixed
     */
    public function saveSettings(array $settings = [])
    {
        if (empty($settings)) {
            return false;
        }

        foreach ($settings as $key => $value) {
            $setting = $this->getByKey($key);
            if ($key == 'timezone' && $setting && $setting->value != $value) {
                $this->eventRepository->forceUpdateAllEvents();
            }
            if (!$setting) {
                $setting = new Setting();
                $setting->key = $key;
                $setting->value = $value;
            } else {
                $setting->value = $value;
            }
            $setting->save();
        }

        return true;
    }


    /**
     * Get all timezone
     *
     * @return array
     */
    public function getTimezoneList()
    {
        $timezones = DateTimeZone::listIdentifiers();

        return array_combine($timezones, $timezones);
    }

    /**
     * Get settings in single array
     *
     * @param int $conferenceId
     *
     * @return array
     */
    public function getAllSettingInSingleArray()
    {
        $transformSettings = [];
        $settings = $this->getAll()->get()->toArray();
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                $transformSettings[$setting['key']] = $setting['value'];
            }
        }

        return $transformSettings;
    }

    /**
     * Get value of setting by key or return default vale
     *
     * @param string $key
     * @param string|null $default
     *
     * @return string
     */
    public function getValueByKey($key, $default = null)
    {
        $setting = $this->getByKey($key);

        return $setting ? $setting->value : $default;
    }
}