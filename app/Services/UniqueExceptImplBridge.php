<?php

namespace App\Services;
use App\Contracts\Services\UniqueExceptImplBridge as Contract;
class UniqueExceptImplBridge
    extends UniqueExceptExistableBridge
    implements Contract
{
    protected array $excepts ;
    protected string $only;
    public function build(): bool
    {
        return $this->getDatabaseManager()
                    ->table('permissions')
                    ->whereNotIn('id',$this->getExcepts())
                    ->where('name','=',$this->getOnly())
                    ->exists();
    }

    /**
     * @return array
     */
    public function getExcepts(): array
    {
        return $this->excepts;
    }

    /**
     * @param array $excepts
     */
    public function setExcepts(array $excepts): void
    {
        $this->excepts = $excepts;
    }

    public function getOnly(): string
    {
        return $this->only;
    }

    public function setOnly(string $only):void
    {
        $this->only = $only;
    }


}
