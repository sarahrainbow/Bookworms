<?php

namespace Models {
    
abstract class BranchItem {
    private $branchName;
    private $branchCode;
    
    public function __construct(string $branchName, int $branchCode) {
        $this->setBranchName($branchName);
        $this->setBranchCode($branchCode);
    }
    
    public function getBranchName(){
        return $this->branchName . "\n";
    }
    
    public function setBranchName(string $branchName) {
        $this->branchName = $branchName;
    } 
    
    public function getBranchCode(){
        return $this->branchCode . "\n";
    }
    
    public function setBranchCode(string $branchCode) {
        $this->branchCode = $branchCode;
    } 
}

}

