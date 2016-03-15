# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re

class ORWLab7TestyAplikacjiWwwTestStronyAMW(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "https://www.google.pl/"
        self.verificationErrors = []
        self.accept_next_alert = True
    
    def test_o_r_w_lab7_testy_aplikacji_www_test_strony_a_m_w(self):
        driver = self.driver
        driver.get(self.base_url + "/")
        driver.find_element_by_id("lst-ib").clear()
        driver.find_element_by_id("lst-ib").send_keys("AMW")
        driver.find_element_by_name("btnG").click()
        try: self.assertTrue(self.is_element_present(By.LINK_TEXT, "Akademia Marynarki Wojennej *"))
        except AssertionError as e: self.verificationErrors.append(str(e))
        driver.find_element_by_link_text("Akademia Marynarki Wojennej *").click()
        try: self.assertRegexpMatches(driver.title, r"^Akademia Marynarki Wojennej im\. Bohaterów Westerplatte [\s\S]*$")
        except AssertionError as e: self.verificationErrors.append(str(e))
    
    def is_element_present(self, how, what):
        try: self.driver.find_element(by=how, value=what)
        except NoSuchElementException as e: return False
        return True
    
    def is_alert_present(self):
        try: self.driver.switch_to_alert()
        except NoAlertPresentException as e: return False
        return True
    
    def close_alert_and_get_its_text(self):
        try:
            alert = self.driver.switch_to_alert()
            alert_text = alert.text
            if self.accept_next_alert:
                alert.accept()
            else:
                alert.dismiss()
            return alert_text
        finally: self.accept_next_alert = True
    
    def tearDown(self):
        self.driver.quit()
        self.assertEqual([], self.verificationErrors)

if __name__ == "__main__":
    unittest.main()