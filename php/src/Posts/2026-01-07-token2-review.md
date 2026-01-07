---
author: Ben Weston
date: 2026-01-07T09:28+00:00
title: Review of Token2 Security Keys
type:
  - "blog"
---

I've been using Token2 PIN+ security keys for a little over a year and a half now. They're a FIDO2 certified key that can hold Passkeys and generate OTP codes, often cited as a cheaper alternative to their main competition: Yubikeys. Unfortunately, I've had very poor luck with their durability.

If you want the short version of this review, I suggest you suck up the higher price and go for a Yubikey instead. Although Token2 keys function great, the durability of the PIN+ Type C series just isn't good enough and it can't stand life on a key chain.

## The First Victim

The main reason for getting one of these keys was so that my one time passcodes and security keys were contained in a physical and distinct device. The whole purpose of OTPs is to prove that _you_ know something and they often comprise the [possession factor](https://csrc.nist.gov/glossary/term/multi_factor_authentication) (something you have) of a security measure. The physical analogue of this are keys you keep on your keyring, so for me it makes most sense to put my digital keys there too. However, this is the location where my first Token2 security key fell victim.

The first key I bought from Token2 was a [PIN+ Release 2](https://www.token2.uk/shop/product/token2-t2f2-pin-release2-type-c-fido2-u2f-and-totp-security-key-with-pin-complexity-feature) but I only had it on my keyring for 4 months before the hole on the top cracked, presumably from pressure against my keyring.

![A small USB-C security key. There is are two cracks originating from the hole at the end, used for attaching it to a keyring, causing the plastic casing to fall apart.](/assets/pin+r2.jpg)

Fearing that further damage might occur to the electronics inside I bought a second one and transferred my secrets to it.

## The Second Victim

That leads us to today where, once again, I've got a broken Token2 security key. For the second key I brought a [PIN+ Release 3](https://www.token2.uk/shop/product/t2f2-pin-release3-typec) which is almost identical the first one apart from the bigger number in the name. I thought I'd take greater care over this next key so I 3D printed a case so that I didn't have to directly attach the key to my keyring. That way, hopefully I'd avoid the immense crushing power of my pocket breaking the plastic casing again.

![A red 3D printed case completely encloses the security key leaving only the USB-C port exposed.](/assets/pin+r3.jpg)

The 3D print included a pause so that I could insert the key into the case before the printer permanently cinched the key into it's new plastic home. The fit is very good so [do give me a shout](mailto:me@bweston.uk) if you already have a Token2 key you'd like to protect and would like the files.

Although this new key didn't get crushed, after a year the USB-C port stopped working which made it useless for devices without NFC. A real shame because both of these keys worked so well when they were new. This leaves me only able to recommend the PIN+ Type C series if you're the sort of person who likes to keep their keys in an anti-static bag, away from hench pockets. Hopefully, their other mechanical designs are more robust but I've been stung twice too many and I won't be made a fool for a third time.

## The Solution?

So what's going to be replacing my malfunctioning key? After two failed attempts, I've decided to take the "buy once, cry once" approach and get an expensive Yubikey after all. More specifically a [YubiKey 5C NFC](https://www.yubico.com/gb/product/yubikey-5-series/yubikey-5c-nfc/).

![YubiKey 5C NFC security key](/assets/5c-nfc.webp)

Hopefully, this works out a bit better.
